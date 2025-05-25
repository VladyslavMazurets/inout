<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;

class PriceController extends Controller
{
    public function index()
    {
        $courses = Course::query()
            ->selectRaw('*, price - (price * discount / 100) as final_price')
            ->orderBy('final_price', 'asc');

        $recommendedCourses = $courses->get()->take(3);

        return Inertia::render('Prices/Index', [
            'recommendedCourses' => $recommendedCourses,
            'allCourses' => $courses->skip(3)->simplePaginate(10),
        ]);
    }
}
