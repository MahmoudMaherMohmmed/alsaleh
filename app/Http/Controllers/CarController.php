<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\Dashboard\StoreCarRequest;
use App\Http\Requests\Dashboard\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cars = Car::latest()->get();

        return view('dashboard.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.cars.form', ['car' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreCarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->validated());

        return redirect()->route('cars.show', $car)->with('success', trans('cars.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\View\View
     */
    public function show(Car $car)
    {
        return view('dashboard.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\View\View
     */
    public function edit(Car $car)
    {
        return view('dashboard.cars.form', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateCarRequest $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());

        return redirect()->route('cars.show', $car)->with('success', trans('cars.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', trans('cars.messages.deleted'));
    }
}
