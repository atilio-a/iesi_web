<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use App\Models\Product;
use App\Models\TourismService;

class GraduatesController extends Controller
{
    public function index()
    {
        $graduates = Graduate::query()->latest()->get();

        return view('graduates.index', compact('graduates'));
    }

    public function show(int $graduate)
    {
        $graduate = Graduate::query()
            ->with(['products', 'tourismServices'])
            ->findOrFail($graduate);

        return view('graduates.show', compact('graduate'));
    }

    public function product(int $graduate, int $product)
    {
        $product = Product::query()
            ->where('graduate_id', $graduate)
            ->findOrFail($product);

        return view('graduates.product', compact('product'));
    }

    public function service(int $graduate, int $service)
    {
        $service = TourismService::query()
            ->where('graduate_id', $graduate)
            ->findOrFail($service);

        return view('graduates.service', compact('service'));
    }
}
