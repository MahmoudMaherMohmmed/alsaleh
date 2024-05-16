<?php

namespace App\Http\Controllers;

use App\Enums\ClientTypeEnum;
use App\Models\Client;
use App\Models\ReportAccident;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $users = User::latest()->limit(5)->get();
        $users_count = User::count();
        $patients = Client::where('type', ClientTypeEnum::PATIENT)->latest()->limit(5)->get();
        $patients_count = Client::where('type', ClientTypeEnum::PATIENT)->count();
        $doctors = Client::where('type', ClientTypeEnum::DOCTOR)->latest()->limit(5)->get();
        $doctors_count = Client::where('type', ClientTypeEnum::DOCTOR)->count();

        return view('dashboard.index', compact('users', 'users_count', 'patients', 'patients_count', 'doctors', 'doctors_count'));
    }
}
