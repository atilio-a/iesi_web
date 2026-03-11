<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Graduate;

class GraduatesController extends Controller
{
    public function index()
    {
        $graduates = Graduate::query()->with('user')->latest()->get();

        return view('admin.graduates.index', compact('graduates'));
    }
}
