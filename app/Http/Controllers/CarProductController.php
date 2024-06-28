<?php

namespace App\Http\Controllers;

use App\Enums\CarProductTrackingTypeEnum;
use App\Enums\WarehouseTrackingTypeEnum;
use App\Models\Car;
use App\Http\Requests\Dashboard\StoreCarProductRequest;
use App\Models\CarProductTracking;
use App\Models\Warehouse;
use App\Models\WarehouseTracking;

class CarProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreCarProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCarProductRequest $request)
    {
        //Save product to car
        $car = Car::where('id', $request->car_id)->first();
        if ($car->products()->where('product_id', $request->product_id)->exists()) {
            $car->products()->updateExistingPivot($request->product_id, [
                'quantity' => $request->quantity + $car->products()->where('product_id', $request->product_id)->first()->pivot->quantity
            ]);
        } else {
            $car->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        }

        //Save to car product tracking
        CarProductTracking::create([
            'user_id' => auth()->id(),
            'car_id' => $request->car_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'type' => CarProductTrackingTypeEnum::NEW,
        ]);

        //Decrement quantity from warehouse
        Warehouse::where('product_id', $request->product_id)->decrement('quantity', $request->quantity);

        //Save action to warehouse tracking
        WarehouseTracking::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'type' => WarehouseTrackingTypeEnum::MOVED_TO_CAR
        ]);

        return redirect()->route('cars.products', $car)->with('success', trans('car_products.messages.created'));
    }
}
