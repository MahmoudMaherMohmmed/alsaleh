<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::with('installments')->filter()->active()->latest()->get();

        return response()->json([
            'status' => true,
            'message' => trans('products.messages.retrieved'),
            'data' => ProductResource::collection($products ?? [])
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        return response()->json([
            'status' => true,
            'message' => trans('products.messages.retrieved'),
            'data' => new ProductResource($product->load('installments'))
        ], 200);
    }
}
