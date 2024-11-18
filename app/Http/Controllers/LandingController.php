<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::query()
            ->with(['instructors', 'media'])
            ->latest()
            ->limit(5)
            ->get();

        return Inertia::render('Landing/Index')->with(
            [
                'courses' => $courses,
            ]
        );
    }
}
