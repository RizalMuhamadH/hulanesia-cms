<?php

namespace App\Helpers;

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
            'asc(ordder)',
            'desc(created_at)',
            'desc(timestamp)'
        ]);
        $client->index('photo')->updateRankingRules([
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

        $client->deleteIndex('post');
        $client->deleteIndex('category');
        $client->deleteIndex('photo');
    }
}
