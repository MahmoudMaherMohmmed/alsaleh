<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer' => new CustomerResource($this->customer),
            'product' => new ProductResource($this->product),
            'date' => $this->date,
            'type' => $this->type,
            'localed_type' => optional($this->type)->trans(),
            'price' => $this->price,
            'status' => $this->status,
            'localed_status' => optional($this->status)->trans(),
            'created_at' => optional($this->created_at)->toDateTimeString(),
            'created_at_formatted' => optional($this->created_at)->diffForHumans(),
            'installments' => SaleInstallmentsResource::collection($this->installments)
        ];
    }
}
