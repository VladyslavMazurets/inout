<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Testimonial;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::query()
            ->with(['instructors', 'media'])
            ->latest()
            ->limit(4)
            ->get();

        $instructors = Instructor::with('media')->limit(5)->get();

        $testimonials = Testimonial::with('media')->orderBy('date', 'desc')->get();

        return Inertia::render('Landing/Index')->with(
            [
                'courses' => $courses,
                'instructors' => $instructors,
                'testimonials' => $testimonials,
            ]
        );
    }
}
