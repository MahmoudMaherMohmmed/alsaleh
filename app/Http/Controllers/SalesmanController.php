<?php

namespace App\Http\Controllers;

use App\Enums\ClientTypeEnum;
use App\Models\Client;
use App\Http\Requests\Dashboard\StoreSalesmanRequest;
use App\Http\Requests\Dashboard\UpdateSalesmanRequest;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $salesmen = Client::latest()->get();

        return view('dashboard.salesmen.index', compact('salesmen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.salesmen.form', ['salesman' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreSalesmanRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSalesmanRequest $request)
    {
        $salesman = Client::create(array_merge($request->validated(), ['type' => ClientTypeEnum::SALES_MAN]));
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $salesman->addMediaFromRequest('image')
                ->toMediaCollection(Client::AVATAR_COLLECTION_NAME);
        }

        return redirect()->route('salesmen.show', $salesman)->with('success', trans('salesmen.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Client $salesman
     * @return \Illuminate\View\View
     */
    public function show(Client $salesman)
    {
        return view('dashboard.salesmen.show', compact('salesman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Client $salesman
     * @return \Illuminate\View\View
     */
    public function edit(Client $salesman)
    {
        return view('dashboard.salesmen.form', compact('salesman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateSalesmanRequest $request
     * @param \App\Models\Client $salesman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSalesmanRequest $request, Client $salesman)
    {
        $salesman->fill($request->except('image', 'password'));
        if ($request->password != null) {
            $salesman->password = $request->password;
        }
        $salesman->save();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $salesman->clearMediaCollection(Client::AVATAR_COLLECTION_NAME);
            $salesman->addMediaFromRequest('image')
                ->toMediaCollection(Client::AVATAR_COLLECTION_NAME);
        }

        return redirect()->route('salesmen.show', $salesman)->with('success', trans('salesmen.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Client $salesman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $salesman)
    {
        $salesman->update([
            'phone' => $salesman->id . '-' . $salesman->phone,
            'email' => $salesman->id . '-' . $salesman->email
        ]);
        $salesman->delete();

        return redirect()->back()->with('success', trans('salesmen.messages.deleted'));
    }
}
