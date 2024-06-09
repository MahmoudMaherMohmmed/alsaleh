<?php

namespace App\Http\Controllers\Api;

use App\Enums\SaleStatusEnum;
use App\Enums\SaleTypeEnum;
use App\Http\Requests\Api\StoreSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Services\SaleService;

class SaleController extends Controller
{
    private SaleService $saleService;

    /**
     * SaleController constructor.
     */
    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sales = Sale::latest()->get();

        return response()->json([
            'status' => true,
            'message' => trans('sales.messages.retrieved'),
            'data' => SaleResource::collection($sales ?? [])
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\StoreSaleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSaleRequest $request)
    {
        $car_salesman = $this->saleService->getCarSalesman($request->date);
        if ($car_salesman == null) {
            return response()->json([
                'status' => false,
                'message' => trans('sales.messages.car_subscription_package_has_expired')
            ], 422);
        }

        $sale = Sale::create([
            'customer_id' => $this->saleService->saveCustomer($request),
            'product_id' => $request->product_id,
            'date' => $request->date,
            'type' => $request->type,
            'price' => $this->saleService->getProductPrice($request->product_id, $request->type),
            'car_id' => $car_salesman->car_id,
            'salesman_id' => $car_salesman->salesman_id,
            'salesman_profit_percentage' => $this->saleService->getSalesmanProfitPercentage(),
            'salesman_profit' => $this->saleService->getSalesmanProfit($request->product_id),
            'salesman_assistant_id' => $car_salesman->salesman_assistant_id,
            'salesman_assistant_profit_percentage' => $this->saleService->getSalesmanAssistantProfitPercentage(),
            'salesman_assistant_profit' => $this->saleService->getSalesmanAssistantProfit($request->product_id),
            'status' => $request->type == SaleTypeEnum::CASH->value ? SaleStatusEnum::COMPLETED->value : SaleStatusEnum::INSTALLMENTS_BEING_PAID->value,
        ]);

        return response()->json([
            'status' => true,
            'message' => trans('sales.messages.retrieved'),
            'data' => new SaleResource($sale)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Sale $sale)
    {
        return response()->json([
            'status' => true,
            'message' => trans('sales.messages.retrieved'),
            'data' => new SaleResource($sale)
        ], 200);
    }
}