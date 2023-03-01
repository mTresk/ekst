<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\YoutubeLinkService;

class ProductController extends Controller
{
    public function index()
    {
        $printers = Product::where('product_category_id', '1')->get();
        $extraProducts = Product::where('product_category_id', '2')->get();

        return view('products', compact('printers', 'extraProducts'));
    }

    public function show(Product $product, YoutubeLinkService $service)
    {
        $otherProducts = $product->whereNot('id', $product->id)->get();

        $videoLink = null;
        if ($product->video) {
            $videoLink = $service->simplifyLink($product->video);
        }

        return view('product', compact('product', 'otherProducts', 'videoLink'));
    }
}
