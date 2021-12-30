<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserImageResource extends JsonResource
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
            'id'                        => $this->id,
            'media'                     => [
                'original'              => $this->path,
                'medium'                => $this->thumbnail('medium', 'path'),
                'small'                 => $this->thumbnail('small', 'path'),
                'cropped'               => $this->thumbnail('cropped', 'path'),
            ],
            'photographer'              => $this->photographer
        ];
    }
}
