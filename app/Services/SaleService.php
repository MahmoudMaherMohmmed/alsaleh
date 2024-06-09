<?php

namespace App\Services;

use App\Models\CarSalesman;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SaleService
{
    public function saveCustomer($request)
    {
        $customer = Customer::updateOrCreate(['phone' => $request->customer_phone], [
            'name' => $request->customer_name,
            'phone_2' => $request->customer_phone_2,
            'address' => $request->customer_address,
            'lat' => $request->customer_lat,
            'lng' => $request->customer_lng,
        ]);

        if ($request->hasFile('customer_address_voice') && $request->file('customer_address_voice')->isValid()) {
            $customer->addMediaFromRequest('customer_address_voice')
                ->toMediaCollection(Customer::MEDIA_VOICE_ADDRESS_NAME);
        }

        return $customer->id;
    }

    public function getProductPrice($product_id, $type)
    {
        $product = Product::where('id', $product_id)->first();

        if ($type == 1) {
            return $product->cash_price;
        } else {
            return $product->installments()->sum('value');
        }
    }

    public function getCarSalesman($date)
    {
        return CarSalesman::where('salesman_id', auth()->id())
            ->where(function ($query) use ($date) {
                $query->where('start_date', '<=', $date)->Where('end_date', '>=', $date);
            })->first();
    }

    public function getSalesmanProfitPercentage()
    {
        return Setting::first()->salesman_profit_percentage;
    }

    public function getSalesmanProfit($product_id)
    {
        return number_format((Product::where('id', $product_id)->first()->salesman_profit * $this->getSalesmanProfitPercentage()) / 100, 2);
    }

    public function getSalesmanAssistantProfitPercentage()
    {
        return Setting::first()->salesman_assistant_profit_percentage;
    }

    public function getSalesmanAssistantProfit($product_id)
    {
        return number_format((Product::where('id', $product_id)->first()->salesman_profit * $this->getSalesmanAssistantProfitPercentage()) / 100, 2);
    }
}
