<?php

namespace App\Http\Controllers;

use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        $content = Policy::firstOrFail();
        
        return view('policy', compact('content'));
    }
}
