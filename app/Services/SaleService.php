<?php

namespace App\Services;

use App\Enums\CarProductTrackingTypeEnum;
use App\Enums\SaleInstallmentStatusEnum;
use App\Enums\SaleInstallmentTypeEnum;
use App\Enums\SaleStatusEnum;
use App\Models\Car;
use App\Models\CarSalesman;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SaleInstallment;
use App\Models\Setting;

class SaleService
{
    public function saveCustomer($request)
    {
        $customer = Customer::where(['salesman_id' => auth()->id(), 'phone' => trim($request->customer_phone)])->first();
        if ($customer != null) {
            $customer->update([
                'name' => $request->customer_name,
                'phone_2' => $request->customer_phone_2,
                'area_id' => $request->customer_area_id,
                'address' => $request->customer_address,
                'lat' => $request->customer_lat,
                'lng' => $request->customer_lng,
            ]);
        } else {
            $customer = Customer::create([
                'salesman_id' => auth()->id(),
                'reference_id' => customer_new_reference_id(auth()->id()),
                'name' => $request->customer_name,
                'phone' => $request->customer_phone,
                'phone_2' => $request->customer_phone_2,
                'area_id' => $request->customer_area_id,
                'address' => $request->customer_address,
                'lat' => $request->customer_lat,
                'lng' => $request->customer_lng,
            ]);
        }

        if ($request->hasFile('customer_address_voice') && $request->file('customer_address_voice')->isValid()) {
            $customer->clearMediaCollection(Customer::MEDIA_VOICE_ADDRESS_NAME);
            $customer->addMediaFromRequest('customer_address_voice')
                ->toMediaCollection(Customer::MEDIA_VOICE_ADDRESS_NAME);
        }

        return $customer->id;
    }

    public function getProductPrice($product_id, $type, $cash_price)
    {
        $product = Product::where('id', $product_id)->first();

        if ($type == 1) {
            return $cash_price;
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

    public function saveInstallments($sale, $installments)
    {
        foreach ($installments as $key => $installment) {
            SaleInstallment::create([
                'sale_id' => $sale->id,
                'title' => $this->getInstallmentName($key),
                'value' => $installment['value'],
                'due_date' => $installment['due_date'],
                'type' => $key == 0 ? SaleInstallmentTypeEnum::DEPOSIT : SaleInstallmentTypeEnum::INSTALLMENT,
                'status' => $installment['status']
            ]);
        }

        if (!$sale->installments()->where('status', SaleInstallmentStatusEnum::UNPAID)->exists()) {
            $sale->update(['status' => SaleStatusEnum::COMPLETED->value]);
        }

        return true;
    }

    private function getInstallmentName($installment_id)
    {
        $installments = [
            0 => ['ar' => 'العربون', 'en' => 'deposit'],
            1 => ['ar' => 'القسط الأول', 'en' => 'First installment'],
            2 => ['ar' => 'القسط الثاني', 'en' => 'Second installment'],
            3 => ['ar' => 'القسط الثالث', 'en' => 'Third installment'],
            4 => ['ar' => 'القسط الرابع', 'en' => 'Fourth installment'],
            5 => ['ar' => 'القسط الخامس', 'en' => 'Fifth installment'],
            6 => ['ar' => 'القسط السادس', 'en' => 'Sixth installment'],
            7 => ['ar' => 'القسط السابع', 'en' => 'Seventh installment'],
            8 => ['ar' => 'القسط الثامن', 'en' => 'Eighth installment'],
            9 => ['ar' => 'القسط التاسع', 'en' => 'Ninth installment'],
            10 => ['ar' => 'القسط العاشر', 'en' => 'Tenth installment'],
        ];

        return $installments[$installment_id];
    }

    public function updateProductQuantity($sale)
    {
        //Update car product quantity
        $car = Car::where('id', $sale->car_id)->first();
        if ($car->products()->where('product_id', $sale->product_id)->exists()) {
            $car->products()->updateExistingPivot($sale->product_id, [
                'quantity' => $car->products()->where('product_id', $sale->product_id)->first()->pivot->quantity - 1
            ]);
        }

        //Save to car product tracking
        auth()->user()->car_product_trackings()->create([
            'car_id' => $sale->car_id,
            'product_id' => $sale->product_id,
            'quantity' => 1,
            'type' => CarProductTrackingTypeEnum::SOLD,
        ]);

        //Decrement product quantity
        $sale->product()->decrement('quantity', 1);

        return true;
    }
}
