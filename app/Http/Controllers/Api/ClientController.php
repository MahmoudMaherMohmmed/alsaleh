<?php

namespace App\Http\Controllers\Api;

use App\Enums\ClientTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    /**
     * Login User
     *
     * @param \App\Http\Requests\Api\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $client = Client::where('type', ClientTypeEnum::SALES_MAN)->where('phone', $request->phone)->first();

        if ($client != null) {
            if (Hash::check($request->password, $client->password)) {
                $client->token = $client->createToken('API')->accessToken;

                return response()->json(['status' => true, 'message' => trans('api.logged_in_successfully'), 'data' => new ClientResource($client)], 200);
            } else {
                return response()->json(['status' => false, "message" => trans('api.password')], 403);
            }
        } else {
            return response()->json(['status' => false, "message" => trans('api.user_does_not_exist')], 403);
        }
    }

    /**
     * Update client device token
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDeviceToken(Request $request)
    {
        $request->user()->update(['device_token' => $request->device_token]);

        return response()->json([
            'status' => true,
            'message' => trans('clients.messages.retrieved'),
            'data' => new ClientResource($request->user())
        ], 200);
    }

    /**
     * Get profile details
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {
        $request->user()->token = $request->bearerToken();

        return response()->json([
            'status' => true,
            'message' => trans('clients.messages.retrieved'),
            'data' => new ClientResource($request->user())
        ], 200);
    }

    /**
     * Logout profile
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['status' => true, 'message' => trans('api.logout')], 200);
    }

    /**
     * Delete profile
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $client = $request->user();

        $client->update([
            'phone' => $client->id . '-' . $client->phone,
            'email' => $client->id . '-' . $client->email
        ]);
        $client->delete();
        $request->user()->token()->revoke();

        return response()->json(['status' => true, 'message' => trans('api.account_deleted_successfully')], 200);
    }
}
