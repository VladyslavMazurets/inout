<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');
Route::get('/courses/load-more', [CourseController::class, 'loadMore'])->name('courses.load-more');

Route::get('/instructors', function () {
    return Inertia::render('Instructors/Index');
})->name('instructors');

Route::get('/posts', function () {
    return Inertia::render('Posts/Index');
})->name('posts');

Route::get('/prices', function () {
    return Inertia::render('Prices/Index');
})->name('prices');
