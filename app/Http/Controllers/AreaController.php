<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Requests\Dashboard\StoreAreaRequest;
use App\Http\Requests\Dashboard\UpdateAreaRequest;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $areas = Area::latest()->get();

        return view('dashboard.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.areas.form', ['area' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreAreaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAreaRequest $request)
    {
        $area = Area::create($request->validated());

        return redirect()->route('areas.show', $area)->with('success', trans('areas.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Area $area
     * @return \Illuminate\View\View
     */
    public function show(Area $area)
    {
        return view('dashboard.areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Area $area
     * @return \Illuminate\View\View
     */
    public function edit(Area $area)
    {
        return view('dashboard.areas.form', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateAreaRequest $request
     * @param \App\Models\Area $area
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        $area->update($request->validated());

        return redirect()->route('areas.show', $area)->with('success', trans('areas.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Area $area
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index')->with('success', trans('areas.messages.deleted'));
    }
}
