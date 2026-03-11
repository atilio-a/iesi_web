<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TourismService;
use Illuminate\Http\Request;

class GraduatePanelController extends Controller
{
    public function index(Request $request)
    {
        $graduate = $request->user()?->graduate;

        return view('graduate-panel.index', compact('graduate'));
    }

    public function products(Request $request)
    {
        $graduate = $request->user()?->graduate;
        $products = $graduate ? Product::where('graduate_id', $graduate->id)->get() : collect();

        return view('graduate-panel.products', compact('graduate', 'products'));
    }

    public function services(Request $request)
    {
        $graduate = $request->user()?->graduate;
        $services = $graduate ? TourismService::where('graduate_id', $graduate->id)->get() : collect();

        return view('graduate-panel.services', compact('graduate', 'services'));
    }
}
