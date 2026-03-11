<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->with('graduate')->latest()->get();

        return view('admin.products.index', compact('products'));
    }
}
