<?php

namespace App\Http\Filters;

class ProductFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title'
    ];

    /**
     * Filter the query by title.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function title($value)
    {
        if ($value != null) {
            return $this->builder->where(function ($query) use ($value) {
                $query->where('title->ar', 'LIKE', "%$value%")->orWhere('title->en', 'LIKE', "%$value%");
            });
        }

        return $this->builder;
    }
}
