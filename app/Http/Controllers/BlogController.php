<?php

namespace App\Http\Controllers;

use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog');
    }

    public function show($slug, Article $article)
    {
        $article = $article->where('slug', $slug)->firstOrFail();
        $otherArticles = $article->whereNot('id', $article->id)->get()->take(5);

        $previous = $article::where('published_at', '<', $article->published_at)->max('id');
        $next = $article::where('published_at', '>', $article->published_at)->min('id');

        return view('article', compact('article', 'otherArticles'))
            ->with('previous', $article::find($previous))
            ->with('next', $article::find($next));
    }
}
