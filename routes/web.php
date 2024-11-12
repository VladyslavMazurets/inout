<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Landing/Index');
})->name('landing');


Route::get('/courses', function () {
    return Inertia::render('Courses/Index');
})->name('courses');


Route::get('/instructors', function () {
    return Inertia::render('Instructors/Index');
})->name('instructors');

Route::get('/posts', function () {
    return Inertia::render('Posts/Index');
})->name('posts');

Route::get('/prices', function () {
    return Inertia::render('Prices/Index');
})->name('prices');
