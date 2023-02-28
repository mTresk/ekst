<?php

namespace App\Http\Controllers;

use App\Models\Liquid;
use App\Models\Part;
use App\Models\Program;

class ServiceController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        $liquids = Liquid::all();
        $programs = Program::all();

        return view('service', compact('parts', 'liquids', 'programs'));
    }

    public function show($slug, Program $program)
    {
        $program = $program->where('slug', $slug)->firstOrFail();

        return view('program', compact('program'));
    }
}
