<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        $customers = Customer::where('salesman_id', auth()->id())->filter()->latest()->paginate(5);

        return CustomerResource::collection($customers ?? []);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'status' => true,
            'message' => trans('customers.messages.retrieved'),
            'data' => new CustomerResource($customer->load('sales'))
        ], 200);
    }
}
