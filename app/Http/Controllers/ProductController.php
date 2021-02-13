<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $products = Product::latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $products,
        ], 200);
    }

    public function store(ProductRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = Product::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function show(Product $product): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $product,
        ], 200);
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
