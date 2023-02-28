<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $printers = Product::where('product_category_id', '1')->get();
        return view('home', compact('printers'));
    }
}
