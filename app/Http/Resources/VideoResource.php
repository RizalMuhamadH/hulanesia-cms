<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'vid'               => $this->vid,
            'title'             => $this->title,
            'slug'              => $this->slug,
            'description'       => $this->description,
            'thumbnail'         => $this->thumbnail,
            'duration'          => $this->duration,
            'status'            => $this->status,
            'created_at'        => $this->created_at->timestamp * 1000,
        ];
    }
}
