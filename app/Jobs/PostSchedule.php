<?php

namespace App\Jobs;

use App\Http\Resources\PostResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Post;
use App\Repository\Elasticsearch;
use App\Repository\PushNotification;
use Elasticsearch\ClientBuilder;

class PostSchedule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $pid;

    public function __construct($pid)
    {
        $this->pid = $pid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post = Post::find($this->pid);
        $post->update(['status' => 'PUBLISH']);
        $post->save();

        // $post = Post::findOrFail($this->id);

        $params = [
            'index' => 'article',
            'id'    => $this->pid,
            'body'  => [
                'doc'   => json_decode((new PostResource($post))->toJson(), true)
            ]
        ];

        $repository = ClientBuilder::create()->setHosts([
            env("ELASTICSEARCH_HOST", "")
        ])->build();
        $repository->create($params);


        $push = new PushNotification();
        $push->sendNotification($post->id,"Berita Terbaru", $post->title, env('STORAGE').'/'.$post->image->thumbnail('medium', 'path'), env('WEBSITE_URL').'/'.$post->url, "web");
    }
}
