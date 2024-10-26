<?php

namespace App\Http\Controllers\CraftablePro;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\CraftablePro\Post\IndexPostRequest;
use App\Http\Requests\CraftablePro\Post\CreatePostRequest;
use App\Http\Requests\CraftablePro\Post\StorePostRequest;
use App\Http\Requests\CraftablePro\Post\EditPostRequest;
use App\Http\Requests\CraftablePro\Post\UpdatePostRequest;
use App\Http\Requests\CraftablePro\Post\DestroyPostRequest;
use App\Http\Requests\CraftablePro\Post\BulkDestroyPostRequest;
use App\Models\Author;
use Brackets\CraftablePro\Queries\Filters\FuzzyFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexPostRequest $request): Response | JsonResponse | RedirectResponse
    {
        $defaultSort = "id";

        if (!$request->has('sort')) {
            return redirect()->route($request->route()->getName(), ['sort' => $defaultSort]);
        }

        $postsQuery = QueryBuilder::for(Post::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new FuzzyFilter(
                    'id',
                    'title',
                    'slug'
                )),
            ])
            ->defaultSort($defaultSort)
            ->allowedSorts('id', 'title', 'slug');

        if ($request->wantsJson() && $request->get('bulk_select_all')) {
            return response()->json($postsQuery->select(['id'])->pluck('id'));
        }

        $posts = $postsQuery
            ->select('id', 'title', 'slug')
            ->paginate($request->get('per_page'))->withQueryString();

        Session::put('posts_url', $request->fullUrl());

        return Inertia::render('Post/Index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreatePostRequest $request): Response
    {
        return Inertia::render('Post/Create', [
            'authorsOptions' => Author::all()->map(fn($author) => ['value' => $author->id, 'label' => $author->first_name . ' ' . $author->last_name]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated());

        if ($request->has('authors_ids')) {
            $post->authors()->sync($request->input('authors_ids'));
        }

        return redirect()->route('craftable-pro.posts.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditPostRequest $request, Post $post): Response
    {
        $post->load('media', 'authors');

        return Inertia::render('Post/Edit', [
            'post' => $post,
            'authorsOptions' => Author::all()->map(fn($author) => ['value' => $author->id, 'label' => $author->first_name . ' ' . $author->last_name]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        if ($request->has('authors_ids')) {
            $post->authors()->sync($request->input('authors_ids'));
        }

        if (session('posts_url')) {
            return redirect(session('posts_url'))->with(['message' => ___('craftable-pro', 'Operation successful')]);
        }

        return redirect()->route('craftable-pro.posts.index')->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyPostRequest $request, Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }

    /**
     * Bulk destroy resource.
     */
    public function bulkDestroy(BulkDestroyPostRequest $request): RedirectResponse
    {
        // Mass delete of resource
        DB::transaction(function () use ($request) {
            collect($request->validated()['ids'])
                ->chunk(1000)
                ->each(function ($bulkChunk) {
                    Post::whereIn('id', $bulkChunk)->delete();
                });
        });

        // Individual delete of resource items
        //        DB::transaction(function () use ($request) {
        //            collect($request->validated()['ids'])->each(function ($id) {
        //                Post::find($id)->delete();
        //            });
        //        });

        return redirect()->back()->with(['message' => ___('craftable-pro', 'Operation successful')]);
    }
}
