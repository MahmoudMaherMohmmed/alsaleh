<?php

namespace App\Http\Filters;

use App\Models\Customer;
use App\Models\Product;

class SaleFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'product_title',
        'customer_id',
        'area_id',
        'date',
        'type'
    ];

    /**
     * Filter the query by product.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function productTitle($value)
    {
        if ($value != null) {
            $products_ids = Product::where(function ($query) use ($value) {
                $query->where('title->ar', 'LIKE', "%$value%")->orWhere('title->en', 'LIKE', "%$value%");
            })->withTrashed()->pluck('id');

            return $this->builder->whereIn('product_id', $products_ids);
        }

        return $this->builder;
    }

    /**
     * Filter the query by area.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function areaId($value)
    {
        if ($value) {
            return $this->builder->whereIn('customer_id', Customer::where('area_id', $value)->withTrashed()->pluck('id'));
        }

        return $this->builder;
    }

    /**
     * Filter the query by customer.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function customerId($value)
    {
        if ($value) {
            return $this->builder->where('customer_id', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by date.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function date($value)
    {
        if ($value) {
            return $this->builder->where('date', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by type.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function type($value)
    {
        if ($value) {
            return $this->builder->where('type', $value);
        }

        return $this->builder;
    }
}
