<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Article;
use App\Models\Client;
use App\Models\Number;
use App\Models\Product;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $printers = Product::where('product_category_id', '1')->get();
        $articles = Article::orderBy('published_at', 'DESC')->get()->take(3);
        $numbers = Number::all();
        $advantages = Advantage::all();
        $clients = Client::all();

        $videoLinks = Video::all()->take(6);
        $videos = [];

        foreach ($videoLinks as $link) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link->url, $match);
            $videos[] = $match[1];
        }


        return view('home', compact('printers', 'articles', 'numbers', 'advantages', 'clients', 'videos'));
    }
}
