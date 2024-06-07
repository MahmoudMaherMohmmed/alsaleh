<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->data['title'],
            'body' => $this->data['body'],
            'read_at' => $this->read_at != null ? $this->read_at->diffForHumans() : '---',
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
