<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Graduate;
use App\Models\News;
use App\Models\Story;

class DashboardController extends Controller
{
    public function index()
    {
        $metrics = [
            'news' => News::count(),
            'stories' => Story::count(),
            'graduates' => Graduate::count(),
        ];

        return view('admin.dashboard', compact('metrics'));
    }
}
