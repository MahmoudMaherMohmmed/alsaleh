<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AreaResource;
use App\Models\Area;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $areas = Area::active()->latest()->get();

        return response()->json([
            'status' => true,
            'message' => trans('areas.messages.retrieved'),
            'data' => AreaResource::collection($areas ?? [])
        ], 200);
    }
}
