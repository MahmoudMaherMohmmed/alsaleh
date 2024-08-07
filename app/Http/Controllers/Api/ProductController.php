<?php

namespace App\Http\Controllers\Api;

use App\Enums\ProductTypeEnum;
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
        if ($salesman_car != null && $salesman_car->car != null) {
            $products = Product::with('installments')
                ->whereIn('id', $salesman_car->car->products()->wherePivot('quantity', '>', 0)->pluck('id'))
                ->filter()->active()->orderBy('type', 'DESC')->paginate(50);
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
