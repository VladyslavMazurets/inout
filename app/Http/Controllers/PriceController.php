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
            ->orderBy('final_price', 'asc')
            ->get();

        return Inertia::render('Prices/Index', [
            'courses' => $courses,
        ]);
    }
}
