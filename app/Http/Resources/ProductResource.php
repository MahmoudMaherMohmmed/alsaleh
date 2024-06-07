<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->getTranslation('title', app()->getLocale()),
            'description' => $this->getTranslation('description', app()->getLocale()),
            'serial_number' => $this->serial_number,
            'quantity' => $this->quantity,
            'cash_price' => $this->cash_price,
            'image' => $this->getImage(),
            'created_at' => optional($this->created_at)->toDateTimeString(),
            'created_at_formatted' => optional($this->created_at)->diffForHumans(),
            'installments' => ProductInstallmentsResource::collection($this->installments ?? [])
        ];
    }
}
