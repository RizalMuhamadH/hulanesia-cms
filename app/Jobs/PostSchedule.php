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

class PostSchedule implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $post;
    protected $repository;

    public function __construct($post, $repository)
    {
        $this->post = $post;
        $this->repository = $repository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post = Post::where('id', $this->post->id)->update(['status' => 'PUBLISH']);

        $params = [
            'index' => 'article',
            'id'    => $this->post->id,
            'body'  => [
                'doc'   => json_decode((new PostResource($post))->toJson(), true)
            ]
        ];
        $es = $this->repository->update($params);
    }
}
