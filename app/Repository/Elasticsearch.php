<?php

namespace App\Repository;

use Elasticsearch\ClientBuilder;

class Elasticsearch {
    protected $client;
    public function __construct()
    {
        $this->client = ClientBuilder::create()->setHosts([
            env("ELASTICSEARCH_HOST", "")
        ])->build();
    }

    public function getInstance()
    {
        return $this->client;
    }

    public function index($params)
    {
        $this->client->index($params);
    }

    public function create($params)
    {
        return $this->client->create($params);
    }

    public function update($params)
    {
        return $this->client->update($params);
    }

    public function upsert($params)
    {
        return $this->client->upsert($params);
    }

    public function delete($params)
    {
        return $this->client->delete($params);
    }

    public function get($params)
    {
        return $this->client->get($params);
    }

    public function bulk($params)
    {
        $this->client->bulk($params);
    }

    public function search($params)
    {
        return $this->client->search($params);
    }

    public function createIndex($params)
    {
        return $this->client->indices()->create($params);
    }

    public function existIndex($params)
    {
        return $this->client->indices()->exists($params);
    }
}