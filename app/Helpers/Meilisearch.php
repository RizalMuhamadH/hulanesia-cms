<?php
namespace App\Helpers;

use MeiliSearch\Client;

class Meilisearch {
    

    public function __construct()
    {    
        $client = new Client(env('MEILISEARCH_HOST',''), env('MEILISEARCH_KEY', null));
    }
        
    
    public static function get()
    {
        $client = new Client(env('MEILISEARCH_HOST',''), env('MEILISEARCH_KEY', null));
        return $client;
    }

    public static function getIndexs()
    {
        $client = new Client(env('MEILISEARCH_HOST',''), env('MEILISEARCH_KEY', null));
        return $client->getAllIndexes();
    }

    public function setFacetFilter()
    {
        $client = new Client(env('MEILISEARCH_HOST',''), env('MEILISEARCH_KEY', null));
        $client->index('post')->updateAttributesForFaceting(['tags_slug']);
    }

    public function setRankingRule()
    {
        $client = new Client(env('MEILISEARCH_HOST',''), env('MEILISEARCH_KEY', null));
        $client->index('post')->updateRankingRules([
            'desc(created_at)'
          ]);
        $client->index('category')->updateRankingRules([
            'asc(ordder)',
            'desc(created_at)'
          ]);
        $client->index('photo')->updateRankingRules([
            'desc(created_at)'
          ]);
    }
}