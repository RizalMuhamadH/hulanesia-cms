<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'id'                        => $this->id,
            'caption'                   => $this->caption,
            'media'                     => [
                'original'              => $this->path,
                'medium'                => $this->thumbnail('medium', 'path'),
                'small'                 => $this->thumbnail('small', 'path'),
                'cropped'               => $this->thumbnail('cropped', 'path'),
            ],
            'photographer'              => $this->photographer,
            'source'                    => $this->source,
            'created_at'                => $this->created_at
        ];
    }
}
