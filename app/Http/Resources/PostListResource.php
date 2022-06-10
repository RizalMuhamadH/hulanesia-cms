<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostListResource extends JsonResource
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
            'title'             => $this->title,
            'image'             => '/storage/'.$this->image->thumbnail('medium', 'path'),
            'url'               => '/'.$this->category->slug.'/'.$this->id.'/'.Carbon::parse($this->published_at)->format('dmY').'/'.$this->slug,
            'category'          => $this->category->name,
            'category_url'      => $this->category->slug,
            'created_at'        => $this->created_at,
            'publish_at'        => $this->published_at,
        ];
    }
}
