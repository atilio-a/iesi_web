<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LibraryItem;

class LibraryController extends Controller
{
    public function index()
    {
        $items = LibraryItem::query()->latest('published_at')->get();

        return view('admin.library.index', compact('items'));
    }
}
