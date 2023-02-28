<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $printers = Product::where('product_category_id', '1')->get();
        $extraProducts = Product::where('product_category_id', '2')->get();

        return view('products', compact('printers', 'extraProducts'));
    }

    public function show($slug, Product $product)
    {
        $product = $product->where('slug', $slug)->firstOrFail();
        $otherProducts = $product->whereNot('id', $product->id)->get();

        $videoLink = null;

        if ($product->video) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $product->video, $match);
            $videoLink = $match[1];
        }

        return view('product', compact('product', 'otherProducts', 'videoLink'));
    }
}
