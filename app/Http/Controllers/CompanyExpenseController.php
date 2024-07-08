<?php

namespace App\Http\Controllers;

use App\Enums\ClientTypeEnum;
use App\Enums\ExpenseCategoryTypeEnum;
use App\Models\Client;
use App\Models\CompanyExpense;
use App\Http\Requests\Dashboard\StoreCompanyExpenseRequest;
use App\Http\Requests\Dashboard\UpdateCompanyExpenseRequest;
use App\Models\ExpenseCategory;

class CompanyExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $company_expenses = CompanyExpense::latest()->get();

        return view('dashboard.expenses.company.index', compact('company_expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $company_expense = null;
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->active()->get();
        $categories = ExpenseCategory::where('type', ExpenseCategoryTypeEnum::COMPANY)->latest()->active()->get();

        return view('dashboard.expenses.company.form', compact('company_expense', 'salesmen', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreCompanyExpenseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCompanyExpenseRequest $request)
    {
        $company_expense = CompanyExpense::create($request->validated());

        return redirect()->route('company_expenses.show', $company_expense)->with('success', trans('company_expenses.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CompanyExpense $company_expense
     * @return \Illuminate\View\View
     */
    public function show(CompanyExpense $company_expense)
    {
        return view('dashboard.expenses.company.show', compact('company_expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CompanyExpense $company_expense
     * @return \Illuminate\View\View
     */
    public function edit(CompanyExpense $company_expense)
    {
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->active()->get();
        $categories = ExpenseCategory::where('type', ExpenseCategoryTypeEnum::COMPANY)->latest()->active()->get();

        return view('dashboard.expenses.company.form', compact('company_expense', 'salesmen', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateCompanyExpenseRequest $request
     * @param \App\Models\CompanyExpense $company_expense
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCompanyExpenseRequest $request, CompanyExpense $company_expense)
    {
        $company_expense->update($request->validated());

        return redirect()->route('company_expenses.show', $company_expense)->with('success', trans('company_expenses.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CompanyExpense $company_expense
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CompanyExpense $company_expense)
    {
        $company_expense->delete();

        return redirect()->route('company_expenses.index')->with('success', trans('company_expenses.messages.deleted'));
    }
}
