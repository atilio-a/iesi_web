<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::query()->latest('published_at')->get();

        return view('admin.stories.index', compact('stories'));
    }
}
