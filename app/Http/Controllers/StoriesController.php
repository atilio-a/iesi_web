<?php

namespace App\Http\Controllers;

use App\Models\Story;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::query()->latest('published_at')->get();

        return view('stories.index', compact('stories'));
    }

    public function show(string $slug)
    {
        $story = Story::query()->where('slug', $slug)->firstOrFail();
        $relatedStories = Story::query()
            ->where('type', $story->type)
            ->where('id', '!=', $story->id)
            ->latest('published_at')
            ->take(2)
            ->get();

        return view('stories.show', compact('story', 'relatedStories'));
    }
}
