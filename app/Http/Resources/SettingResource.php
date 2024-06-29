<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'image' => $this->getImage(),
            'whatsapp_number' => $this->whatsapp_number,
            'calling_number' => $this->calling_number,
            'info_email' => $this->info_email,
            'support_email' => $this->support_email,
            'maximum_period_salesman_can_delete_sale' => $this->maximum_period_salesman_can_delete_sale,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'created_at_formatted' => $this->created_at ? $this->created_at->diffForHumans() : null,
        ];
    }
}
