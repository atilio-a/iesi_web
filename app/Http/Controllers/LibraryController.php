<?php

namespace App\Http\Controllers;

use App\Models\LibraryItem;

class LibraryController extends Controller
{
    public function index()
    {
        $items = LibraryItem::query()->latest('published_at')->get();

        return view('library.index', compact('items'));
    }
}
