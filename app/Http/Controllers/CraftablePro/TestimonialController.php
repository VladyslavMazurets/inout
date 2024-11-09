<?php
namespace App\Http\Controllers\CraftablePro;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use App\Http\Requests\CraftablePro\Testimonial\IndexTestimonialRequest;
use App\Http\Requests\CraftablePro\Testimonial\CreateTestimonialRequest;
use App\Http\Requests\CraftablePro\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\CraftablePro\Testimonial\EditTestimonialRequest;
use App\Http\Requests\CraftablePro\Testimonial\UpdateTestimonialRequest;
use App\Http\Requests\CraftablePro\Testimonial\DestroyTestimonialRequest;
use App\Http\Requests\CraftablePro\Testimonial\BulkDestroyTestimonialRequest;
use Brackets\CraftablePro\Queries\Filters\FuzzyFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexTestimonialRequest $request): Response | JsonResponse | RedirectResponse
    {
        $defaultSort = "id";

        if (!$request->has('sort')) {
            return redirect()->route($request->route()->getName(), ['sort' => $defaultSort]);
        }

        $testimonialsQuery = QueryBuilder::for(Testimonial::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new FuzzyFilter(
                    'id','name','position','rating'
                )),
            ])
            ->defaultSort($defaultSort)
            ->allowedSorts('id','name','position','rating');

        if ($request->wantsJson() && $request->get('bulk_select_all')) {
            return response()->json($testimonialsQuery->select(['id'])->pluck('id'));
        }

        $testimonials = $testimonialsQuery
            ->select('id','name','position','rating')
            ->paginate($request->get('per_page'))->withQueryString();

        Session::put('testimonials_url', $request->fullUrl());

        return Inertia::render('Testimonial/Index', [
            'testimonials' => $testimonials,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateTestimonialRequest $request): Response
    {
        return Inertia::render('Testimonial/Create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request): RedirectResponse
    {
        $testimonial = Testimonial::create($request->validated());

        return redirect()->route('craftable-pro.testimonials.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditTestimonialRequest $request, Testimonial $testimonial): Response
    {
        $testimonial->load('media');

        return Inertia::render('Testimonial/Edit', [
            'testimonial' => $testimonial,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($request->validated());

        if (session('testimonials_url')) {
            return redirect(session('testimonials_url'))->with(['message' => ___('craftable-pro', 'Operation successful')]);
        }

        return redirect()->route('craftable-pro.testimonials.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyTestimonialRequest $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Bulk destroy resource.
     */
    public function bulkDestroy(BulkDestroyTestimonialRequest $request): RedirectResponse
    {
        // Mass delete of resource
        DB::transaction(function () use ($request) {
            collect($request->validated()['ids'])
                ->chunk(1000)
                ->each(function ($bulkChunk) {
                    Testimonial::whereIn('id', $bulkChunk)->delete();
                });
        });

        // Individual delete of resource items
        //        DB::transaction(function () use ($request) {
        //            collect($request->validated()['ids'])->each(function ($id) {
        //                Testimonial::find($id)->delete();
        //            });
        //        });

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

}
