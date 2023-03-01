<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Industry;

class SolutionsController extends Controller
{
    public function index()
    {
        $industries = Industry::all();
        $areas = Area::all();

        return view('solutions', compact('industries', 'areas'));
    }

    public function show(Industry $industry)
    {
        $otherIndustries = $industry->whereNot('id', $industry->id)->get();

        return view('solution', compact('industry', 'otherIndustries'));
    }
}
