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
            'description'           => $this->description,
            'editor'                => new PostEditorResource($this->editor),
            'images'                => ImageResource::collection($this->images),
            'created_at'            => $this->created_at,
            'deleted_at'            => $this->deleted_at,
            'timestamp'             => $this->created_at->timestamp
        ];
    }
}
