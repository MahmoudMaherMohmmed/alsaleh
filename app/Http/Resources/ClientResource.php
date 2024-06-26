<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->type,
            'localed_type' => optional($this->type)->trans(),
            'image' => $this->getAvatar(),
            'report_filters_status' => $this->report_filters_status,
            'localed_report_filters_status' => optional($this->report_filters_status)->trans(),
            "activation_code" => $this->activation_code,
            'created_at' => optional($this->created_at)->toDateTimeString(),
            'created_at_formatted' => optional($this->created_at)->diffForHumans(),
            'token' => $this->token != null ? 'Bearer ' . $this->token : null,
        ];
    }
}
