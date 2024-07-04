<?php

namespace App\Http\Controllers\Api;

use App\Enums\SaleTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = Sale::where('salesman_id', auth()->id());
        if (isset($request->start_date) && $request->start_date != null) {
            $query->where('date', '>=', $request->start_date);
        } else {
            $query->where('date', '>=', Carbon::now()->startOfMonth());
        }
        if (isset($request->end_date) && $request->end_date != null) {
            $query->where('date', '<=', $request->end_date);
        } else {
            $query->where('date', '<=', Carbon::now()->endOfMonth());
        }
        $sales = $query->get();

        return response()->json([
            'status' => true,
            'message' => trans('areas.messages.retrieved'),
            'data' => [
                [
                    'key' => 'total_sales_count',
                    'title' => trans('sales.report.total_sales_count'),
                    'value' => $sales->count()
                ],
                [
                    'key' => 'total_cash_sales_count',
                    'title' => trans('sales.report.total_cash_sales_count'),
                    'value' => $sales->where('type', SaleTypeEnum::CASH)->count()
                ],
                [
                    'key' => 'total_cash_sales_amount',
                    'title' => trans('sales.report.total_cash_sales_amount'),
                    'value' => $sales->where('type', SaleTypeEnum::CASH)->sum('price')
                ],
                [
                    'key' => 'total_installment_sales_count',
                    'title' => trans('sales.report.total_installment_sales_count'),
                    'value' => $sales->where('type', SaleTypeEnum::INSTALLMENT)->count()
                ],
            ]
        ], 200);
    }
}
