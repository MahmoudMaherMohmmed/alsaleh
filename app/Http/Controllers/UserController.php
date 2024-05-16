<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Dashboard\StoreUserRequest;
use App\Http\Requests\Dashboard\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.users.form', ['user' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\StoreUserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user->addMediaFromRequest('image')
                ->toMediaCollection(User::MEDIA_COLLECTION_NAME);
        }

        return redirect()->route('users.show', $user)->with('success', trans('admins.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('dashboard.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->except('image', 'password'));
        if ($request->password != null) {
            $user->password = $request->password;
        }
        $user->save();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user->clearMediaCollection(User::MEDIA_COLLECTION_NAME);
            $user->addMediaFromRequest('image')
                ->toMediaCollection(User::MEDIA_COLLECTION_NAME);
        }

        return redirect()->route('users.show', $user)->with('success', trans('admins.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->update([
            'phone' => $user->id . '-' . $user->phone,
            'email' => $user->id . '-' . $user->email
        ]);
        $user->delete();

        return redirect()->back()->with('success', trans('admins.messages.deleted'));
    }
}