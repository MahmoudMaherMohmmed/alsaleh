<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\Dashboard\StoreSettingRequest;
use App\Http\Requests\Dashboard\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::latest()->get();

        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.settings.form', ['setting' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\StoreSettingRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->validated());
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $setting->addMediaFromRequest('image')
                ->toMediaCollection(Setting::MEDIA_COLLECTION_NAME);
        }

        return redirect()->route('settings.show', $setting)->with('success', trans('settings.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\View\View
     */
    public function show(Setting $setting)
    {
        return view('dashboard.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\View\View
     */
    public function edit(Setting $setting)
    {
        return view('dashboard.settings.form', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $setting->clearMediaCollection(Setting::MEDIA_COLLECTION_NAME);
            $setting->addMediaFromRequest('image')
                ->toMediaCollection(Setting::MEDIA_COLLECTION_NAME);
        }

        return redirect()->route('settings.show', $setting)->with('success', trans('settings.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()->back()->with('success', trans('settings.messages.deleted'));
    }
}
