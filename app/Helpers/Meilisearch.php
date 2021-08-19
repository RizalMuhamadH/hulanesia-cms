<?php

namespace App\Helpers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\PhotoResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Tag;
use MeiliSearch\Client;

class Meilisearch
{


    public function __construct()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
    }


    public static function get()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        return $client;
    }

    public static function getIndexs()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        return $client->getAllIndexes();
    }

    public static function setIndexs()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        $client->createIndex('post', ['primaryKey' => 'id']);
        $client->createIndex('category', ['primaryKey' => 'id']);
        $client->createIndex('photo', ['primaryKey' => 'id']);
        $client->createIndex('tag', ['primaryKey' => 'id']);
    }

    public function setFacetFilter()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        $client->index('post')->updateAttributesForFaceting(['tags_slug']);
    }

    public static function setRankingRule()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        $client->index('post')->updateRankingRules([
            'desc(timestamp)',
            'desc(created_at)'
        ]);
        $client->index('category')->updateRankingRules([
            'asc(order)',
            'desc(created_at)',
            'desc(timestamp)'
        ]);
        $client->index('photo')->updateRankingRules([
            'desc(timestamp)',
            'desc(created_at)'
        ]);
        $client->index('tag')->updateRankingRules([
            'desc(timestamp)',
            'desc(created_at)'
        ]);
    }

    public static function deleteAll()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));

        $client->index('post')->deleteAllDocuments();
        $client->index('category')->deleteAllDocuments();
        $client->index('photo')->deleteAllDocuments();
        $client->index('tag')->deleteAllDocuments();

        $client->deleteIndex('post');
        $client->deleteIndex('category');
        $client->deleteIndex('photo');
        $client->deleteIndex('tag');
    }

    public static function storeCategory()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        $categories = Category::get();
        $client->index('category')->addDocuments([...json_decode(CategoryResource::collection($categories)->toJson(), true)]);
    }

    public static function storeTag()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        $tags = Tag::get();
        $client->index('tag')->addDocuments([...json_decode(TagResource::collection($tags)->toJson(), true)]);
    }

    public static function storePost()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        $posts = Post::get();
        $client->index('post')->addDocuments([...json_decode(PostResource::collection($posts)->toJson(), true)]);
    }

    public static function storePhoto()
    {
        $client = new Client(env('MEILISEARCH_HOST', ''), env('MEILISEARCH_KEY', null));
        $photos = Photo::get();
        $client->index('photo')->addDocuments([...json_decode(PhotoResource::collection($photos)->toJson(), true)]);
    }
}
