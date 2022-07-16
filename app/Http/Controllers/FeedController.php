<?php

namespace App\Http\Controllers;

use App\Enums\FeedEnum;
use App\Models\ManagementRss;
use App\Repository\Elasticsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FeedController extends Controller
{

    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }

    public function render(FeedEnum $feed, $token)
    {
        try {
            $slug = decrypt($token);
            $managementRss = ManagementRss::where('slug', $slug)->first();
        } catch (\Throwable $th) {
            abort(404);
        }

        if ($managementRss->category) {
            $query = [
                'match' => [
                    'status' => 'PUBLISH'
                ],
                'match' => [
                    'category.slug' => $managementRss->category->slug
                ]
            ];
        } else {
            $query = [
                'match' => [
                    'status' => 'PUBLISH'
                ],
            ];
        }

        $posts = $this->repository->search([
            'index' => 'article',
            'body'  => [
                'from'      => 0,
                'size'      => 20,
                '_source'   => ['id', 'title', 'slug', 'description', 'image.media.small', 'image.caption', 'feature', 'category', 'author.name', 'publish_at', 'created_at'],
                'sort'      => [
                    [
                        'publish_at' => [
                            'order' => 'desc'
                        ]
                    ]
                ],
                'query'     => $query
            ]
        ]);


        $feed = App::make('Feed');

        $feed->title = 'Bandung Pops';
        $feed->description = 'Bandung Pops';
        $feed->logo = 'logo url';
        $feed->link = env('WEBSITE_URL');
        $feed->setDateFormat('datetime');
        $feed->pubdate = now();
        $feed->lang = 'en';
        $feed->setShortening(true);
        $feed->setTextLimit(100);
        $feed->setCustomView('feed.rss');

        foreach ($posts['hits']['hits'] as $key => $post) {
            $feed->addItem([
                'title' => $post['_source']['title'], 
                'description'=> $post['_source']['description'], 
                'link' => env('WEBSITE_URL') . '/' . $post['_source']['category']['slug'] . '/' . $post['_source']['id'] . '/' . epoch($post['_source']['publish_at'])->format('dmY') . '/' . $post['_source']['slug'], 
                'author' => $post['_source']['author']['name'] ?? '',
                'pubdate' => epoch($post['_source']['publish_at'])->toIso8601String(),
                'media:thumbnail' => [
                    'url' => env('STORAGE').$post['_source']['image']['media']['small']
                ]
            ]);
        }

        return $feed->render('rss');
    }
}
