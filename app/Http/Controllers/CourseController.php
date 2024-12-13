<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    const PER_PAGE = 9;

    public function index(Request $request)
    {
        if($request->sorting === 'A-Z'){
            $courses = Course::query()->with('media')->orderBy('title', 'asc')->simplePaginate(self::PER_PAGE);
        } else if ($request->sorting === 'Z-A'){
            $courses = Course::query()->with('media')->orderBy('title', 'desc')->simplePaginate(self::PER_PAGE);
        } else {
            $courses = Course::query()->with('media')->orderBy('created_at', 'desc')->simplePaginate(self::PER_PAGE);
        }


        return Inertia::render('Courses/Index')->with([
            'courses' => $courses,
        ]);
    }

    public function search(Request $request)
    {
        $searchedCourses = Course::query()->with('media')->where('title', '~', $request->search)->simplePaginate(self::PER_PAGE);
        return Inertia::render('Courses/Search')->with([
            'searchedCourses' => $searchedCourses,
        ]);
    }

    public function loadMore(Request $request)
    {
        $courses = Course::query()->with('media')->orderBy('created_at', 'desc')->simplePaginate(self::PER_PAGE);

        return response()->json([
            'courses' => $courses,
        ]);
    }
}
