<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'reference_id' => $this->reference_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'phone_2' => $this->phone_2,
            'area' => new AreaResource($this->area),
            'address' => $this->address,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'status' => $this->status,
            'localed_status' => optional($this->status)->trans(),
            'voice_address' => $this->getVoiceAddress(),
            'created_at' => optional($this->created_at)->toDateTimeString(),
            'created_at_formatted' => optional($this->created_at)->diffForHumans(),
            'sales' => SaleResource::collection($this->whenLoaded('sales')),
            'sales_count' => $this->sales->count(),
        ];
    }
}
