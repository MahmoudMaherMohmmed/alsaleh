<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\StoreNotificationRequest;
use App\Models\Client;
use Illuminate\Notifications\DatabaseNotification;
use App\Notifications\ReportAccidentNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notifications = DatabaseNotification::latest()->limit(1000)->get();

        return view('dashboard.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.notifications.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\StoreNotificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNotificationRequest $request)
    {
        $clients = Client::whereIn('type', $request->clients)->active()->get();

        // Save notifications
        Notification::send($clients, new ReportAccidentNotification($request->title, $request->body));

        //Send notifications with Firebase
        foreach ($clients as $client) {
            fcm_notification($client->device_token, $request->title, $request->body);
        }

        return redirect()->route('notifications.index')->with('success', trans('notifications.messages.created'));
    }
}
