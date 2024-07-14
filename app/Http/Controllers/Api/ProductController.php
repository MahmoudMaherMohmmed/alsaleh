<?php

namespace App\Http\Controllers\Api;

use App\Models\CarSalesman;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        $salesman_car = CarSalesman::where('salesman_id', auth()->id())->first();
        if ($salesman_car != null) {
            if($salesman_car->car != null) {
                $products = Product::with('installments')
                    ->whereIn('id', $salesman_car->car->products()->pluck('id'))
                    ->filter()->active()->latest()->paginate(5);
            }
        }

        return ProductResource::collection($products ?? []);
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
