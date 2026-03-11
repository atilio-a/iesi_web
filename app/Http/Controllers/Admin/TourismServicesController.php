<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourismService;

class TourismServicesController extends Controller
{
    public function index()
    {
        $services = TourismService::query()->with('graduate')->latest()->get();

        return view('admin.tourism-services.index', compact('services'));
    }
}
