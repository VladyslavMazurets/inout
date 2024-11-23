<?php

namespace App\Http\Controllers\CraftablePro;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CraftablePro\Course\IndexCourseRequest;
use App\Http\Requests\CraftablePro\Course\CreateCourseRequest;
use App\Http\Requests\CraftablePro\Course\StoreCourseRequest;
use App\Http\Requests\CraftablePro\Course\EditCourseRequest;
use App\Http\Requests\CraftablePro\Course\UpdateCourseRequest;
use App\Http\Requests\CraftablePro\Course\DestroyCourseRequest;
use App\Http\Requests\CraftablePro\Course\BulkDestroyCourseRequest;
use App\Models\Instructor;
use App\Models\Testimonial;
use Brackets\CraftablePro\Queries\Filters\FuzzyFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexCourseRequest $request): Response | JsonResponse | RedirectResponse
    {
        $defaultSort = "id";

        if (!$request->has('sort')) {
            return redirect()->route($request->route()->getName(), ['sort' => $defaultSort]);
        }

        $coursesQuery = QueryBuilder::for(Course::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new FuzzyFilter(
                    'id',
                    'title',
                    'slug',
                    'description',
                    'price',
                    'discount',
                    'duration',
                    'content'
                )),
            ])
            ->defaultSort($defaultSort)
            ->allowedSorts('id', 'title', 'slug', 'description', 'price', 'discount', 'duration', 'content');

        if ($request->wantsJson() && $request->get('bulk_select_all')) {
            return response()->json($coursesQuery->select(['id'])->pluck('id'));
        }

        $courses = $coursesQuery
            ->select('id', 'title', 'slug', 'description', 'price', 'discount', 'duration', 'content')
            ->paginate($request->get('per_page'))->withQueryString();

        Session::put('courses_url', $request->fullUrl());

        return Inertia::render('Course/Index', [
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateCourseRequest $request): Response
    {
        return Inertia::render('Course/Create', [
            'instructorsOptions' => Instructor::all()->map(fn($instructor) => ['value' => $instructor->id, 'label' => $instructor->first_name . ' ' . $instructor->last_name]),
            'testimonialsOptions' => Testimonial::whereNull('course_id')->get()->map(fn($testimonial) => ['value' => $testimonial->id, 'label' => $testimonial->name]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $course = Course::create($request->validated());

        if ($request->has('instructors_ids')) {
            $course->instructors()->sync($request->get('instructors_ids'));
        }

        if ($request->has('testimonials_ids')) {
            Testimonial::whereIn('id', $request->get('testimonials_ids'))->update(['course_id' => $course->id]);
        }

        return redirect()->route('craftable-pro.courses.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditCourseRequest $request, Course $course): Response
    {

        $course->load('instructors', 'testimonials', 'media');

        return Inertia::render('Course/Edit', [
            'course' => $course,
            'instructorsOptions' => Instructor::all()->map(fn($instructor) => ['value' => $instructor->id, 'label' => $instructor->first_name . ' ' . $instructor->last_name]),
            "testimonialsOptions" => $testimonialsOptions = Testimonial::where(function ($query) use ($course) {
                $query->where('course_id', $course->id)
                    ->orWhereNull('course_id');
            })->get()->map(fn($testimonial) => [
                'value' => $testimonial->id,
                'label' => $testimonial->name
            ]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course): RedirectResponse
    {
        $course->update($request->validated());

        if ($request->has('instructors_ids')) {
            $course->instructors()->sync($request->get('instructors_ids'));
        }

        if ($request->has('testimonials_ids')) {
            Testimonial::where('course_id', $course->id)->update(['course_id' => null]);
            Testimonial::whereIn('id', $request->get('testimonials_ids'))->update(['course_id' => $course->id]);
        }

        if (session('courses_url')) {
            return redirect(session('courses_url'))->with(['message' => ___('craftable-pro', 'Operation successful')]);
        }

        return redirect()->route('craftable-pro.courses.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyCourseRequest $request, Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Bulk destroy resource.
     */
    public function bulkDestroy(BulkDestroyCourseRequest $request): RedirectResponse
    {
        // Mass delete of resource
        DB::transaction(function () use ($request) {
            collect($request->validated()['ids'])
                ->chunk(1000)
                ->each(function ($bulkChunk) {
                    Course::whereIn('id', $bulkChunk)->delete();
                });
        });

        // Individual delete of resource items
        //        DB::transaction(function () use ($request) {
        //            collect($request->validated()['ids'])->each(function ($id) {
        //                Course::find($id)->delete();
        //            });
        //        });

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }
}
