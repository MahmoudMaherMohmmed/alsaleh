<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Http\Requests\Dashboard\StoreExpenseCategoryRequest;
use App\Http\Requests\Dashboard\UpdateExpenseCategoryRequest;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $expense_categories = ExpenseCategory::latest()->get();

        return view('dashboard.expenses.categories.index', compact('expense_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.expenses.categories.form', ['expense_category' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreExpenseCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreExpenseCategoryRequest $request)
    {
        $expense_category = ExpenseCategory::create($request->validated());

        return redirect()->route('expense_categories.show', $expense_category)->with('success', trans('expense_categories.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ExpenseCategory $expense_category
     * @return \Illuminate\View\View
     */
    public function show(ExpenseCategory $expense_category)
    {
        return view('dashboard.expenses.categories.show', compact('expense_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ExpenseCategory $expense_category
     * @return \Illuminate\View\View
     */
    public function edit(ExpenseCategory $expense_category)
    {
        return view('dashboard.expenses.categories.form', compact('expense_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateExpenseCategoryRequest $request
     * @param \App\Models\ExpenseCategory $expense_category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateExpenseCategoryRequest $request, ExpenseCategory $expense_category)
    {
        $expense_category->update($request->validated());

        return redirect()->route('expense_categories.show', $expense_category)->with('success', trans('expense_categories.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ExpenseCategory $expense_category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ExpenseCategory $expense_category)
    {
        $expense_category->delete();

        return redirect()->route('expense_categories.index')->with('success', trans('expense_categories.messages.deleted'));
    }
}
