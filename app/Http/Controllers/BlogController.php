<?php

namespace App\Http\Controllers;

use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog');
    }

    public function show(Article $article)
    {
        $otherArticles = $article->whereNot('id', $article->id)->get()->take(5);

        $previous = $article::where('published_at', '<', $article->published_at)->orderBy('published_at', 'desc')->first();
        $next = $article::where('published_at', '>', $article->published_at)->orderBy('published_at')->first();

        return view('article', compact('article', 'otherArticles', 'next', 'previous'));
    }
}
