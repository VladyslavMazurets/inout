<?php

namespace App\Http\Controllers\CraftablePro;

use App\Models\Instructor;
use App\Http\Controllers\Controller;
use App\Http\Requests\CraftablePro\Instructor\IndexInstructorRequest;
use App\Http\Requests\CraftablePro\Instructor\CreateInstructorRequest;
use App\Http\Requests\CraftablePro\Instructor\StoreInstructorRequest;
use App\Http\Requests\CraftablePro\Instructor\EditInstructorRequest;
use App\Http\Requests\CraftablePro\Instructor\UpdateInstructorRequest;
use App\Http\Requests\CraftablePro\Instructor\DestroyInstructorRequest;
use App\Http\Requests\CraftablePro\Instructor\BulkDestroyInstructorRequest;
use Brackets\CraftablePro\Queries\Filters\FuzzyFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexInstructorRequest $request): Response | JsonResponse | RedirectResponse
    {
        $defaultSort = "id";

        if (!$request->has('sort')) {
            return redirect()->route($request->route()->getName(), ['sort' => $defaultSort]);
        }

        $instructorsQuery = QueryBuilder::for(Instructor::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new FuzzyFilter(
                    'id',
                    'first_name',
                    'last_name',
                    'slug',
                    'position'
                )),
            ])
            ->defaultSort($defaultSort)
            ->allowedSorts('id', 'first_name', 'last_name', 'slug', 'position');

        if ($request->wantsJson() && $request->get('bulk_select_all')) {
            return response()->json($instructorsQuery->select(['id'])->pluck('id'));
        }

        $instructors = $instructorsQuery
            ->select('id', 'first_name', 'last_name', 'slug', 'position')
            ->paginate($request->get('per_page'))->withQueryString();

        Session::put('instructors_url', $request->fullUrl());

        return Inertia::render('Instructor/Index', [
            'instructors' => $instructors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateInstructorRequest $request): Response
    {
        return Inertia::render('Instructor/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructorRequest $request): RedirectResponse
    {
        $instructor = Instructor::create($request->validated());

        return redirect()->route('craftable-pro.instructors.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditInstructorRequest $request, Instructor $instructor): Response
    {
        $instructor->load('media');

        return Inertia::render('Instructor/Edit', [
            'instructor' => $instructor,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructorRequest $request, Instructor $instructor): RedirectResponse
    {
        $instructor->update($request->validated());

        if (session('instructors_url')) {
            return redirect(session('instructors_url'))->with(['message' => ___('craftable-pro', 'Operation successful')]);
        }

        return redirect()->route('craftable-pro.instructors.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyInstructorRequest $request, Instructor $instructor): RedirectResponse
    {
        $instructor->delete();

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Bulk destroy resource.
     */
    public function bulkDestroy(BulkDestroyInstructorRequest $request): RedirectResponse
    {
        // Mass delete of resource
        DB::transaction(function () use ($request) {
            collect($request->validated()['ids'])
                ->chunk(1000)
                ->each(function ($bulkChunk) {
                    Instructor::whereIn('id', $bulkChunk)->delete();
                });
        });

        // Individual delete of resource items
        //        DB::transaction(function () use ($request) {
        //            collect($request->validated()['ids'])->each(function ($id) {
        //                Instructor::find($id)->delete();
        //            });
        //        });

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }
}
