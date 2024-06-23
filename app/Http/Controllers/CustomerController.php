<?php

namespace App\Http\Controllers;

use App\Enums\ClientTypeEnum;
use App\Http\Requests\Dashboard\StoreCustomerRequest;
use App\Http\Requests\Dashboard\UpdateCustomerRequest;
use App\Models\Area;
use App\Models\Client;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('dashboard.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $customer = null;
        $areas = Area::active()->latest()->get();
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->active()->latest()->get();

        return view('dashboard.customers.form', compact('customer', 'areas', 'salesmen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create(array_merge($request->validated(), ['reference_id' => customer_new_reference_id($request->salesman_id)]));

        return redirect()->route('customers.show', $customer)->with('success', trans('customers.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\View\View
     */
    public function show(Customer $customer)
    {
        return view('dashboard.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        $areas = Area::latest()->get();
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->latest()->get();

        return view('dashboard.customers.form', compact('customer', 'areas', 'salesmen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateCustomerRequest $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return redirect()->route('customers.show', $customer)->with('success', trans('customers.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', trans('customers.messages.deleted'));
    }
}
