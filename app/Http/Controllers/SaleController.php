<?php

namespace App\Http\Controllers;

use App\Enums\CarProductTrackingTypeEnum;
use App\Http\Requests\Dashboard\StoreSaleRequest;
use App\Http\Requests\Dashboard\UpdateSaleRequest;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sales = Sale::latest()->get();

        return view('dashboard.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sale $sale
     * @return \Illuminate\View\View
     */
    public function show(Sale $sale)
    {
        return view('dashboard.sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //Increment car quantity
        $sale_car_product = $sale->car->products()->where('product_id', $sale->product_id)->first();
        $sale_car_product->pivot->quantity = $sale_car_product->pivot->quantity + 1;
        $sale_car_product->pivot->save();

        //Save to car product tracking
        auth()->user()->car_product_trackings()->create([
            'car_id' => $sale->car_id,
            'product_id' => $sale->product_id,
            'quantity' => 1,
            'type' => CarProductTrackingTypeEnum::RETURNED,
        ]);

        //Increment product quantity
        $sale->product()->increment('quantity', 1);

        //Delete customer if not have another sales
        if (Sale::where('customer_id', $sale->customer_id)->count() == 1) {
            $sale->customer()->forceDelete();
        }

        $sale->forceDelete();

        return redirect()->route('sales.index')->with('success', trans('sales.messages.deleted'));
    }
}
