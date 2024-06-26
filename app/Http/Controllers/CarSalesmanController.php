<?php

namespace App\Http\Controllers;

use App\Enums\ClientTypeEnum;
use App\Http\Requests\Dashboard\StoreCarSalesmanRequest;
use App\Http\Requests\Dashboard\UpdateCarSalesmanRequest;
use App\Models\Car;
use App\Models\CarSalesman;
use App\Models\Client;
use Carbon\Carbon;

class CarSalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $car_salesmen = CarSalesman::latest()->get();

        return view('dashboard.car_salesmen.index', compact('car_salesmen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $car_salesman = null;
        $cars = Car::active()->latest()->get();
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->active()->get();

        return view('dashboard.car_salesmen.form', compact('car_salesman', 'cars', 'salesmen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreCarSalesmanRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCarSalesmanRequest $request)
    {
        if (CarSalesman::where('car_id', $request->car_id)->where('start_date', $request->start_date)->first())
            return back()->withInput()->withErrors(['message' => __('car_salesmen.messages.salesmen_added_car_period_before')]);

        if (CarSalesman::where('salesman_id', $request->salesman_id)->where('start_date', $request->start_date)->first())
            return back()->withInput()->withErrors(['message' => __('car_salesmen.messages.salesman_added_to_car_during_this_period_before')]);

        if (CarSalesman::where('salesman_assistant_id', $request->salesman_assistant_id)->where('start_date', $request->start_date)->first())
            return back()->withInput()->withErrors(['message' => __('car_salesmen.messages.salesman_assistant_added_to_car_during_this_period_before')]);

        $car_salesman = CarSalesman::create(array_merge($request->validated(), [
            'end_date' => Carbon::parse($request->start_date)->addMonth()->subDay()->format('Y-m-d')
        ]));

        return redirect()->route('car_salesmen.show', $car_salesman)->with('success', trans('car_salesmen.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CarSalesman $car_salesman
     * @return \Illuminate\View\View
     */
    public function show(CarSalesman $car_salesman)
    {
        return view('dashboard.car_salesmen.show', compact('car_salesman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CarSalesman $car_salesman
     * @return \Illuminate\View\View
     */
    public function edit(CarSalesman $car_salesman)
    {
        $cars = Car::withTrashed()->latest()->get();
        $salesmen = Client::withTrashed()->where('type', ClientTypeEnum::SALES_MAN)->get();

        return view('dashboard.car_salesmen.form', compact('car_salesman', 'cars', 'salesmen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateCarSalesmanRequest $request
     * @param \App\Models\CarSalesman $car_salesman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCarSalesmanRequest $request, CarSalesman $car_salesman)
    {
        if (CarSalesman::where('id', '!=', $car_salesman->id)->where('car_id', $request->car_id)->where('start_date', $request->start_date)->first())
            return back()->withInput()->withErrors(['message' => __('car_salesmen.messages.salesmen_added_car_period_before')]);

        if (CarSalesman::where('id', '!=', $car_salesman->id)->where('salesman_id', $request->salesman_id)->where('start_date', $request->start_date)->first())
            return back()->withInput()->withErrors(['message' => __('car_salesmen.messages.salesman_added_to_car_during_this_period_before')]);

        if (CarSalesman::where('id', '!=', $car_salesman->id)->where('salesman_assistant_id', $request->salesman_assistant_id)->where('start_date', $request->start_date)->first())
            return back()->withInput()->withErrors(['message' => __('car_salesmen.messages.salesman_assistant_added_to_car_during_this_period_before')]);

        $car_salesman->update(array_merge($request->validated(), [
            'end_date' => Carbon::parse($request->start_date)->addMonth()->subDay()->format('Y-m-d')
        ]));

        return redirect()->route('car_salesmen.show', $car_salesman)->with('success', trans('car_salesmen.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CarSalesman $car_salesman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CarSalesman $car_salesman)
    {
        $car_salesman->delete();

        return redirect()->route('car_salesmen.index')->with('success', trans('car_salesmen.messages.deleted'));
    }
}
