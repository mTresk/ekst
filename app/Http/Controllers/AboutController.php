<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $history = History::all();

        return view('about', compact('history'));
    }
}
