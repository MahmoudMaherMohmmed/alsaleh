<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use App\Http\Requests\Dashboard\StoreWarehouseRequest;
use App\Http\Requests\Dashboard\UpdateWarehouseRequest;
use App\Models\WarehouseTracking;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $warehouses = Warehouse::latest()->get();

        return view('dashboard.warehouses.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $warehouse = null;
        $products = Product::active()->latest()->get();

        return view('dashboard.warehouses.form', compact('warehouse', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreWarehouseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreWarehouseRequest $request)
    {
        foreach ($request->products as $key => $product_id) {
            //Save to warehouse
            $warehouse = Warehouse::where('product_id', $product_id)->first();
            if ($warehouse == null) {
                Warehouse::create([
                    'product_id' => $product_id,
                    'quantity' => $request->quantities[$key],
                ]);
            } else {
                $warehouse->increment('quantity', $request->quantities[$key]);
            }

            //Increment product quantity
            Product::where('id', $product_id)->increment('quantity', $request->quantities[$key]);

            //Save to warehouse tracking
            WarehouseTracking::create([
                'user_id' => auth()->id(),
                'product_id' => $product_id,
                'quantity' => $request->quantities[$key],
            ]);
        }

        return redirect()->route('warehouses.index')->with('success', trans('warehouses.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\View\View
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\View\View
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateWarehouseRequest $request
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function tracking()
    {
        $warehouse_trackings = WarehouseTracking::latest()->get();

        return view('dashboard.warehouses.show', compact('warehouse_trackings'));
    }
}
