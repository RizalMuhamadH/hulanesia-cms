<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'slug'                  => $this->slug,
            'title'                 => $this->title,
            'description'           => $this->description,
            'present'               => $this->present,
            'parent_id'             => $this->parent_id,
            'order'                 => $this->order,
            'created_at'            => $this->created_at->timestamp * 1000,
            // 'timestamp'             => $this->created_at->timestamp
        ];
    }
}
