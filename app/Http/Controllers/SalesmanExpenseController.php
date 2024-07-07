<?php

namespace App\Http\Controllers;

use App\Enums\ClientTypeEnum;
use App\Enums\ExpenseCategoryTypeEnum;
use App\Models\Client;
use App\Models\ExpenseCategory;
use App\Models\SalesmanExpense;
use App\Http\Requests\Dashboard\StoreSalesmanExpenseRequest;
use App\Http\Requests\Dashboard\UpdateSalesmanExpenseRequest;

class SalesmanExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $salesman_expenses = SalesmanExpense::latest()->get();

        return view('dashboard.salesman_expenses.index', compact('salesman_expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $salesman_expense = null;
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->active()->get();
        $categories = ExpenseCategory::where('type', ExpenseCategoryTypeEnum::SALESMAN)->latest()->active()->get();

        return view('dashboard.salesman_expenses.form', compact('salesman_expense', 'salesmen', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreSalesmanExpenseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSalesmanExpenseRequest $request)
    {
        $salesman_expense = SalesmanExpense::create($request->validated());

        return redirect()->route('salesman_expenses.show', $salesman_expense)->with('success', trans('salesman_expenses.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SalesmanExpense $salesman_expense
     * @return \Illuminate\View\View
     */
    public function show(SalesmanExpense $salesman_expense)
    {
        return view('dashboard.salesman_expenses.show', compact('salesman_expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SalesmanExpense $salesman_expense
     * @return \Illuminate\View\View
     */
    public function edit(SalesmanExpense $salesman_expense)
    {
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->active()->get();
        $categories = ExpenseCategory::where('type', ExpenseCategoryTypeEnum::SALESMAN)->latest()->active()->get();

        return view('dashboard.salesman_expenses.form', compact('salesman_expense', 'salesmen', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateSalesmanExpenseRequest $request
     * @param \App\Models\SalesmanExpense $salesman_expense
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSalesmanExpenseRequest $request, SalesmanExpense $salesman_expense)
    {
        $salesman_expense->update($request->validated());

        return redirect()->route('salesman_expenses.show', $salesman_expense)->with('success', trans('salesman_expenses.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SalesmanExpense $salesman_expense
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SalesmanExpense $salesman_expense)
    {
        $salesman_expense->delete();

        return redirect()->route('salesman_expenses.index')->with('success', trans('salesman_expenses.messages.deleted'));
    }
}
