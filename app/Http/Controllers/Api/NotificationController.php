<?php

namespace App\Http\Controllers\Api;

use App\Models\Notification;
use Illuminate\Routing\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use AuthorizesRequests;

    /**
     * NotificationController constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the notifications.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $notifications = auth()->user()->notifications()->where('deleted_at', null)->get();

        return response()->json([
            'status' => true,
            'message' => trans('notifications.messages.retrieved'),
            'data' => NotificationResource::collection($notifications)
        ], 200);
    }

    /**
     * Display the specified Notification.
     *
     * @param \App\Models\Notification $notification
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Notification $notification)
    {
        return response()->json([
            'status' => true,
            'message' => trans('notifications.messages.retrieved'),
            'data' => new NotificationResource($notification)
        ], 200);
    }

    /**
     * Display a listing of the notifications.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unread()
    {
        $notifications = auth()->user()->unreadNotifications;

        return response()->json([
            'status' => true,
            'message' => trans('notifications.messages.retrieved'),
            'data' => NotificationResource::collection($notifications)
        ], 200);
    }

    /**
     * Mark notification as read.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsReadNotification(Request $request)
    {
        auth()->user()->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        $notifications = auth()->user()->unreadNotifications;

        return response()->json([
            'status' => true,
            'message' => trans('notifications.messages.retrieved'),
            'data' => NotificationResource::collection($notifications)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Notification $notification
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json([
            'status' => true,
            'message' => trans('notifications.messages.deleted'),
        ], 200);
    }
}
