<?php

namespace App\Http\Controllers\Api;

use App\Enums\SaleInstallmentStatusEnum;
use App\Enums\SaleInstallmentTypeEnum;
use App\Enums\SaleTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleInstallment;
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
        $installments_query = SaleInstallment::whereIn('sale_id', $query->pluck('id'));
        if (isset($request->start_date) && $request->start_date != null) {
            $query->where('date', '>=', $request->start_date);
            $installments_query->where('due_date', '>=', $request->start_date);
        } else {
            $query->where('date', '>=', Carbon::now()->startOfMonth());
            $installments_query->where('due_date', '>=', Carbon::now()->startOfMonth());
        }
        if (isset($request->end_date) && $request->end_date != null) {
            $query->where('date', '<=', $request->end_date);
            $installments_query->where('due_date', '<=', $request->end_date);
        } else {
            $query->where('date', '<=', Carbon::now()->endOfMonth());
            $installments_query->where('due_date', '<=', Carbon::now()->endOfMonth());
        }
        $sales = $query->get();
        $installments = $installments_query->get();

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
                [
                    'key' => 'total_paid_sales_deposit_count',
                    'title' => trans('sales.report.total_paid_sales_deposit_count'),
                    'value' => $installments->where('type', SaleInstallmentTypeEnum::DEPOSIT)->where('status', SaleInstallmentStatusEnum::PAID)->count()
                ],
                [
                    'key' => 'total_paid_sales_deposit_amount',
                    'title' => trans('sales.report.total_paid_sales_deposit_amount'),
                    'value' => $installments->where('type', SaleInstallmentTypeEnum::DEPOSIT)->where('status', SaleInstallmentStatusEnum::PAID)->sum('value')
                ],
                [
                    'key' => 'total_unpaid_sales_deposit_count',
                    'title' => trans('sales.report.total_unpaid_sales_deposit_count'),
                    'value' => $installments->where('type', SaleInstallmentTypeEnum::DEPOSIT)->where('status', SaleInstallmentStatusEnum::UNPAID)->count()
                ],
                [
                    'key' => 'total_unpaid_sales_deposit_amount',
                    'title' => trans('sales.report.total_unpaid_sales_deposit_amount'),
                    'value' => $installments->where('type', SaleInstallmentTypeEnum::DEPOSIT)->where('status', SaleInstallmentStatusEnum::UNPAID)->sum('value')
                ],
            ]
        ], 200);
    }
}
