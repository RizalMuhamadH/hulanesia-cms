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
            'image'             => $this->image->thumbnail('medium', 'path'),
            'url'               => '/'.$this->category->slug.'/'.$this->id.'/'.Carbon::parse($this->published_at)->format('dmY').'/'.$this->slug,
            'category'          => $this->category->name,
            'category_url'      => $this->category->slug,
            'created_at'        => Carbon::parse($this->created_at)->timestamp * 1000,
            'publish_at'        => Carbon::parse($this->published_at)->timestamp * 1000
        ];
    }
}
