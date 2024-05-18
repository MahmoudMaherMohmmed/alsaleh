<?php

namespace App\Http\Controllers;

use App\Enums\ClientTypeEnum;
use App\Models\Car;
use App\Models\Client;
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
        $salesmen = Client::where('type', ClientTypeEnum::SALES_MAN)->latest()->limit(5)->get();
        $salesmen_count = Client::where('type', ClientTypeEnum::SALES_MAN)->count();
        $cars = Car::latest()->limit(5)->get();
        $cars_count = Car::count();

        return view('dashboard.index', compact('users', 'users_count', 'salesmen', 'salesmen_count', 'cars', 'cars_count'));
    }
}
