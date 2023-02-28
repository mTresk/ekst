<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\History;
use App\Models\Number;
use App\Models\Review;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $history = History::all();
        $numbers = Number::all();
        $advantages = Advantage::all();
        $reviews = Review::all();

        return view('about', compact('history', 'numbers', 'advantages', 'reviews'));
    }
}
