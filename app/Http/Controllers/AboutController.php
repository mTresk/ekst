<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Number;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $history = History::all();
        $numbers = Number::all();

        return view('about', compact('history', 'numbers'));
    }
}
