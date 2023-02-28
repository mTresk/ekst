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

        return view('product', compact('product', 'otherProducts'));
    }
}
