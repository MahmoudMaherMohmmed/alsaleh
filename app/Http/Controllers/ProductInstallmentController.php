<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\StoreProductInstallmentRequest;
use App\Http\Requests\Dashboard\UpdateProductInstallmentRequest;
use App\Models\ProductInstallment;

class ProductInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreProductInstallmentRequest $request)
    {
        $product_installment = ProductInstallment::create($request->validated());

        return redirect()->route('products.installments', $product_installment->product_id)->with('success', trans('product_installments.messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductInstallment $product_installment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductInstallment $product_installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductInstallmentRequest $request, ProductInstallment $product_installment)
    {
        $product_installment->update($request->validated());

        return redirect()->route('products.installments', $product_installment->product_id)->with('success', trans('product_installments.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductInstallment $product_installment)
    {
        $product_id = $product_installment->product_id;

        $product_installment->delete();

        return redirect()->route('products.installments', $product_id)->with('success', trans('product_installments.messages.deleted'));
    }
}
