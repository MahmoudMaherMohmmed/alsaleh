<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingController extends Controller
{
    /**
     * Return settings
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $setting = Setting::first();

        return response()->json([
            'status' => true,
            'message' => trans('settings.messages.retrieved'),
            'data' => $setting != null ? new SettingResource($setting) : []
        ], 200);
    }

    /**
     * Return languages
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function languages()
    {
        $languages = [];

        foreach (LaravelLocalization::getSupportedLocales() as $code => $properties) {
            array_push($languages, [
                'code' => $code,
                'title' => $properties['native']
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => trans('settings.messages.retrieved'),
            'data' => $languages,
        ], 200);
    }
}
