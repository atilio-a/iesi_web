<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::query()->orderBy('name')->get();
        $query = News::query()->latest('published_at');

        if (request('category')) {
            $query->whereHas('category', function ($builder) {
                $builder->where('slug', request('category'));
            });
        }

        $news = $query->get();

        return view('news.index', compact('news', 'categories'));
    }

    public function show(string $slug)
    {
        $news = News::query()->where('slug', $slug)->firstOrFail();

        return view('news.show', compact('news'));
    }
}
