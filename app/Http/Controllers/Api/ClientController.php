<?php

namespace App\Http\Controllers\Api;

use App\Enums\ClientTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\ResendCodeRequest;
use App\Http\Requests\Api\UpdatePasswordRequest;
use App\Http\Requests\Api\UpdateProfileImageRequest;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Requests\Api\VerifyCodeRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function login(LoginRequest $request)
    {
        $client = Client::where('type', ClientTypeEnum::PATIENT)->where('phone', $request->phone)->first();

        if ($client != null) {
            if (Hash::check($request->password, $client->password)) {
                if ($client->status == 0) {
                    $activation_code = $this->setClientActivationCode($client);
                    $sms_status = json_decode(send_sms($client->phone, generate_activation_code_message($activation_code), true));
                }

                $this->updateDeviceToken($client, $request->device_token);

                $client->token = $client->createToken('API')->accessToken;

                return response()->json(['status' => true, 'message' => trans('api.logged_in_successfully'), 'data' => new ClientResource($client)], 200);
            } else {
                return response()->json(['status' => false, "message" => trans('api.password')], 403);
            }
        } else {
            return response()->json(['status' => false, "message" => trans('api.user_does_not_exist')], 403);
        }
    }

    private function updateDeviceToken($client, $device_token)
    {
        $client->device_token = $device_token;
        $client->save();

        return true;
    }

    public function register(RegisterRequest $request)
    {
        $client = Client::create($request->validated() + ['status' => 0, 'type' => 0]);

        $activation_code = $this->setClientActivationCode($client);
        $sms_status = json_decode(send_sms($client->phone, generate_activation_code_message($activation_code), true));

        $client->token = $client->createToken('API')->accessToken;

        return response()->json(['status' => true, 'message' => trans('api.new_user_added_successfully'), 'data' => new ClientResource($client)], 200);
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $client = Client::where('type', $request->type)->where('phone', $request->phone)->first();
        if ($client == null) {
            return response()->json(['status' => false, "message" => trans('api.user_does_not_exist')], 403);
        }

        if ($client->status == 0) {
            return response()->json(['status' => false, "message" => trans('api.your_account_is_not_activated')], 403);
        }

        $activation_code = $this->setClientActivationCode($client);
        $sms_status = json_decode(send_sms($client->phone, generate_activation_code_message($activation_code), true));

        return response()->json(['status' => true, "message" => trans('api.activation_code_send_successfully'), 'data' => ['code' => $activation_code, 'token' => 'Bearer ' . $client->createToken('API')->accessToken]], 200);
    }

    public function resendCode(ResendCodeRequest $request)
    {
        $client = Client::where('type', ClientTypeEnum::PATIENT)->where('phone', $request->phone)->first();
        if ($client == null) {
            return response()->json(['status' => false, "message" => trans('api.user_does_not_exist')], 403);
        }

        $activation_code = $this->setClientActivationCode($client);
        $sms_status = json_decode(send_sms($client->phone, generate_activation_code_message($activation_code), true));

        return response()->json(['status' => true, "message" => trans('api.activation_code_resend_successfully'), "data" => ['code' => $activation_code, 'token' => 'Bearer ' . $client->createToken('API')->accessToken]], 200);
    }

    public function verifyCode(VerifyCodeRequest $request)
    {
        $client = Client::where('id', $request->user()->id)->
        where('type', ClientTypeEnum::PATIENT)->where('activation_code', $request->code)->first();
        if (isset($client) && $client != null) {
            //activate account
            $client->update([
                'status' => 1
            ]);
            $client->token = $request->bearerToken();

            return response()->json(['status' => true, 'message' => trans('api.verify_code'), 'data' => new ClientResource($client)], 200);
        }
        return response()->json(['status' => false, 'message' => trans('api.wrong_activation_code')], 403);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $client = $request->user();
        if ($client) {
            $request->user()->token()->revoke();

            $update_client = Client::where('id', $client->id)->first();
            $update_client->password = $request->new_password;
            $update_client->save();

            return response()->json(['status' => true, "message" => trans('api.password_changed_successfully')], 200);
        }
        return response()->json(['status' => false, "message" => trans('api.user_does_not_exist')], 403);
    }


    public function profile(Request $request)
    {
        $request->user()->token = $request->bearerToken();

        return response()->json([
            'status' => true,
            'message' => trans('clients.messages.retrieved'),
            'data' => new ClientResource($request->user())
        ], 200);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $updated_client = Client::where('id', $request->user()->id)->first();
        $updated_client->fill($request->only('name', 'phone'));
        $updated_client->update();
        $updated_client->token = $request->bearerToken();

        return response()->json(['status' => true, 'message' => trans('api.update_profile'), 'data' => new ClientResource($updated_client)], 200);
    }

    public function updateProfileImage(UpdateProfileImageRequest $request)
    {
        $client = Client::where('id', $request->user()->id)->first();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $client->clearMediaCollection(Client::AVATAR_COLLECTION_NAME);
            $client->addMediaFromRequest('image')
                ->toMediaCollection(Client::AVATAR_COLLECTION_NAME);
        }
        $client->update();
        $client->token = $request->bearerToken();

        return response()->json(['status' => true, 'message' => trans('api.update_profile'), 'data' => new ClientResource($client)], 200);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $client = $request->user();
        if ($client) {
            if (Hash::check($request->old_password, $client->password)) {
                $request->user()->token()->revoke();

                $update_client = Client::where('id', $client->id)->first();
                $update_client->password = $request->new_password;
                $update_client->save();

                return response()->json(['status' => true, "message" => trans('api.password_changed_successfully')], 200);
            } else {
                return response()->json(['status' => false, "message" => trans('api.wrong_password')], 403);
            }
        } else {
            return response()->json(['status' => false, "message" => trans('api.user_does_not_exist')], 403);
        }
    }

    private function setClientActivationCode($client)
    {
        //$code = rand(1000, 9999);
        $code = '0000';
        $client->update(['activation_code' => $code]);

        return $code;
    }

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
