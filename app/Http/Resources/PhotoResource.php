<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
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
            'title'                 => $this->title,
            'slug'                  => $this->slug,
            'user_id'               => $this->user_id,
            'user_name'             => $this->user->name,
            'images'                => ImageResource::collection($this->images),
            'created_at'            => $this->created_at,
            'timestamp'             => $this->created_at->timestamp
        ];
    }
}
