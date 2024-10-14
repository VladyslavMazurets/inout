<?php
namespace App\Http\Controllers\CraftablePro;

use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\CraftablePro\Author\IndexAuthorRequest;
use App\Http\Requests\CraftablePro\Author\CreateAuthorRequest;
use App\Http\Requests\CraftablePro\Author\StoreAuthorRequest;
use App\Http\Requests\CraftablePro\Author\EditAuthorRequest;
use App\Http\Requests\CraftablePro\Author\UpdateAuthorRequest;
use App\Http\Requests\CraftablePro\Author\DestroyAuthorRequest;
use App\Http\Requests\CraftablePro\Author\BulkDestroyAuthorRequest;
use Brackets\CraftablePro\Queries\Filters\FuzzyFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexAuthorRequest $request): Response | JsonResponse | RedirectResponse
    {
        $defaultSort = "id";

        if (!$request->has('sort')) {
            return redirect()->route($request->route()->getName(), ['sort' => $defaultSort]);
        }

        $authorsQuery = QueryBuilder::for(Author::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new FuzzyFilter(
                    'id','first_name','last_name','links'
                )),
            ])
            ->defaultSort($defaultSort)
            ->allowedSorts('id','first_name','last_name','links');

        if ($request->wantsJson() && $request->get('bulk_select_all')) {
            return response()->json($authorsQuery->select(['id'])->pluck('id'));
        }

        $authors = $authorsQuery
            ->select('id','first_name','last_name','links')
            ->paginate($request->get('per_page'))->withQueryString();

        Session::put('authors_url', $request->fullUrl());

        return Inertia::render('Author/Index', [
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateAuthorRequest $request): Response
    {
        return Inertia::render('Author/Create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        $author = Author::create($request->validated());

        return redirect()->route('craftable-pro.authors.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditAuthorRequest $request, Author $author): Response
    {
        $author->load('media');

        return Inertia::render('Author/Edit', [
            'author' => $author,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author): RedirectResponse
    {
        $author->update($request->validated());

        if (session('authors_url')) {
            return redirect(session('authors_url'))->with(['message' => ___('craftable-pro', 'Operation successful')]);
        }

        return redirect()->route('craftable-pro.authors.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyAuthorRequest $request, Author $author): RedirectResponse
    {
        $author->delete();

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Bulk destroy resource.
     */
    public function bulkDestroy(BulkDestroyAuthorRequest $request): RedirectResponse
    {
        // Mass delete of resource
        DB::transaction(function () use ($request) {
            collect($request->validated()['ids'])
                ->chunk(1000)
                ->each(function ($bulkChunk) {
                    Author::whereIn('id', $bulkChunk)->delete();
                });
        });

        // Individual delete of resource items
        //        DB::transaction(function () use ($request) {
        //            collect($request->validated()['ids'])->each(function ($id) {
        //                Author::find($id)->delete();
        //            });
        //        });

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

}
