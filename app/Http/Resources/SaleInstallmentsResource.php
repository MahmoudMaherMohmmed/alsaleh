<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleInstallmentsResource extends JsonResource
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
            'value' => $this->value,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'localed_status' => optional($this->status)->trans(),
            'created_at' => optional($this->created_at)->toDateTimeString(),
            'created_at_formatted' => optional($this->created_at)->diffForHumans(),
        ];
    }
}
