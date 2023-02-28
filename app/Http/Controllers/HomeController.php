<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Number;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $printers = Product::where('product_category_id', '1')->get();
        $articles = Article::orderBy('published_at', 'DESC')->get()->take(3);
        $numbers = Number::all();

        return view('home', compact('printers', 'articles', 'numbers'));
    }
}
