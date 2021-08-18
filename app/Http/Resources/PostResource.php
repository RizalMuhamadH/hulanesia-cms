<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'                => $this->id,
            'title'             => $this->title,
            'slug'              => $this->slug,
            'description'       => $this->description,
            'body'              => $this->body,
            'source'            => $this->source,
            'source_link'       => $this->source_link,
            'feature_id'        => $this->feature_id,
            'feature'           => $this->feature->name,
            'category_id'       => $this->category_id,
            'category_name'     => $this->category->name,
            'category_slug'     => $this->category->slug,
            'user_id'           => $this->user_id,
            'user'              => $this->user->name,
            'author_id'         => $this->author_id,
            'author'            => $this->author->name,
            'status'            => $this->status,
            'tags_name'         => $this->tags->map(fn($item, $key) => $item->name),
            'tags_slug'         => $this->tags->map(fn($item, $key) => $item->slug),
            'image'             => new ImageResource($this->image),
            'meta_description'  => $this->meta_description,
            'meta_keywords'     => $this->meta_keywords,
            'seo_title'         => $this->seo_title,
            'created_at'        => $this->created_at,
            'timestamp'         => $this->created_at->timestamp
        ];
    }
}