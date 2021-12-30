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
            'feature'           => new PostFeatureResource($this->feature),
            'category'          => new PostCategoryResource($this->category),
            'editor'            => new PostEditorResource($this->user),
            'author'            => new PostAuthorResource($this->author),
            'status'            => $this->status,
            'tags'              => PostTagResource::collection($this->tags),
            'image'             => new ImageResource($this->image),
            'meta_description'  => $this->meta_description,
            'meta_keywords'     => $this->meta_keywords,
            'seo_title'         => $this->seo_title,
            'created_at'        => $this->created_at,
            'deleted_at'        => $this->deleted_at,
            'publish_at'        => $this->published_at,
            'timestamp'         => $this->created_at->timestamp
        ];
    }
}
