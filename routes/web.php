<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::craftablePro('admin');

/* Auto-generated admin routes */
Route::middleware('craftable-pro-middlewares')->prefix('admin')->name('craftable-pro.')->group(function () {
    Route::get('authors', [App\Http\Controllers\CraftablePro\AuthorController::class, 'index'])->name('authors.index');
    Route::get('authors/create', [App\Http\Controllers\CraftablePro\AuthorController::class, 'create'])->name('authors.create');
    Route::post('authors', [App\Http\Controllers\CraftablePro\AuthorController::class, 'store'])->name('authors.store');
    Route::get('authors/edit/{author}', [App\Http\Controllers\CraftablePro\AuthorController::class, 'edit'])->name('authors.edit');
    Route::match(['put', 'patch'], 'authors/{author}', [App\Http\Controllers\CraftablePro\AuthorController::class, 'update'])->name('authors.update');
    Route::delete('authors/{author}', [App\Http\Controllers\CraftablePro\AuthorController::class, 'destroy'])->name('authors.destroy');
    Route::post('authors/bulk-destroy', [App\Http\Controllers\CraftablePro\AuthorController::class, 'bulkDestroy'])->name('authors.bulk-destroy');
});


/* Auto-generated admin routes */
Route::middleware('craftable-pro-middlewares')->prefix('admin')->name('craftable-pro.')->group(function () {
    Route::get('posts', [App\Http\Controllers\CraftablePro\PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [App\Http\Controllers\CraftablePro\PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [App\Http\Controllers\CraftablePro\PostController::class, 'store'])->name('posts.store');
    Route::get('posts/edit/{post}', [App\Http\Controllers\CraftablePro\PostController::class, 'edit'])->name('posts.edit');
    Route::match(['put', 'patch'], 'posts/{post}', [App\Http\Controllers\CraftablePro\PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [App\Http\Controllers\CraftablePro\PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('posts/bulk-destroy', [App\Http\Controllers\CraftablePro\PostController::class, 'bulkDestroy'])->name('posts.bulk-destroy');
});
