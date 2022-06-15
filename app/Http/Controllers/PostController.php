<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Controllers\ContentTypes\ImageHandler;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Models\Activity;
use App\Http\Resources\PostResource;
use App\Helpers\Meilisearch;
use App\Http\Resources\PostListResource;
use App\Jobs\PostSchedule;
use App\Repository\Elasticsearch;
use App\Repository\PushNotification;
use Carbon\Carbon;
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $layout = $request->layout ?? 'app';
        return view('post.index', [
            'layout' => $layout
        ]);
    }

    public function add()
    {


        $action = 'Add';
        $categories = Category::with('children')->where('parent_id', 0)->get();
        $users = User::get();

        return view('post.edit-add', [
            'action' => $action,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->published_at);
        // dd(now()->diffInMinutes($request->published_at));
        // dd(now()->addMinutes($request->published_at)->minute);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);

        if ($request->status == PostStatus::SCHEDULE) {
            $published_at = $request->published_at;
        } else if ($request->status == PostStatus::PUBLISH) {
            $published_at = now();
        } else {
            $published_at = null;
        }

        DB::transaction(function () use ($request, $published_at) {

            $post = Post::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, "-"),
                'description' => $request->description,
                'body' => $request->body,
                'source' => $request->source,
                'source_link' => $request->source_link,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'seo_title' => $request->seo_title,
                'published_at' => $published_at,
                'admin_id' => Auth::user()->hasRole('writter') ? null : Auth::user()->id,
                'author_id' => Auth::user()->hasRole('writter') ? Auth::user()->id : $request->author_id
            ]);


            $post->tags()->attach($request->tags);
            $post->related()->attach($request->related);

            if ($request->hasFile('image')) {

                $options = [
                    "resize" => [
                        "width" => "1024",
                        "height" => "null"
                    ],
                    "quality" => "70%",
                    "upsize" => true,
                    "thumbnails" => [
                        [
                            "name" => "medium",
                            "scale" => "50%"
                        ],
                        [
                            "name" => "small",
                            "scale" => "25%"
                        ],
                        [
                            "name" => "cropped",
                            "crop" => [
                                "width" => "300",
                                "height" => "250"
                            ]
                        ]
                    ]
                ];
                $options = json_decode(json_encode($options));

                $path = (new ImageHandler($request, 'posts', 'image', $options))->handle();
                $post->image()->create(['path' => $path, 'caption' => $request->caption]);
            }


            
            // if ($request->status == 'SCHEDULE') {
            //     $schedule = new Schedule();
            //     $schedule->job(new PostSchedule($post, $this->repository))->when(fn()=> Carbon::parse($published_at)->isPast());
            //     // PostSchedule::dispatchSync(new PostSchedule($post, $this->repository))->delay(now()->addMinutes(now()->diffInMinutes($request->published_at)));
            // }
            
            if ($request->status == PostStatus::PUBLISH){
                $params = [
                    'index' => 'article',
                    'id'    => $post->id,
                    'body'  => json_decode((new PostResource($post))->toJson(), true)
                ];
                $es = $this->repository->create($params);

                $push = new PushNotification();
                $push->sendNotification($post->id,"Berita Terbaru", $post->title, env('STORAGE').'/'.$post->image->thumbnail('medium', 'path'), env('WEBSITE_URL').'/'.$post->url, "web");
            }

            // PostSchedule::dispatch($post, $this->repository);

            activity()
                ->performedOn(new Post())
                ->event('store')
                ->withProperties(['data' => $post->with(['tags', 'image'])])
                ->log('store post');
        });


        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {

        $post = Post::findOrFail($id);
        // $this->authorize('update', $post);

        $categories = Category::with('children')->where('parent_id', 0)->get();
        $users = User::get();

        $action = 'Edit';
        return view('post.edit-add', [
            'content' => $post,
            'action' => $action,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function update(Request $request, Post $post)
    {

        $this->authorize('update', $post);

        $current = $post;

        if ($post->status == PostStatus::DRAFT && $request->status == PostStatus::PUBLISH) {
            $published_at = now();
        } else {
            $published_at = $post->published_at;
        }


        DB::transaction(function () use ($request, $published_at, $post, $current) {
            $post->update([

                'title' => $request->title,
                'slug' => Str::slug($request->title, "-"),
                'description' => $request->description,
                'body' => $request->body,
                'source' => $request->source,
                'source_link' => $request->source_link,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'seo_title' => $request->seo_title,
                'author_id' => $request->author_id,
                'published_at' => $published_at,
                'admin_id' => Auth::user()->hasRole('writter') ? null : Auth::user()->id,
                'author_id' => Auth::user()->hasRole('writter') ? Auth::user()->id : $request->author_id
            ]);

            // dd($post->tags->pluck('id'));
            // $post->tags()->sync($post->tags->pluck('id'));
            $post->tags()->detach();
            $post->tags()->attach($request->tags);
            $post->related()->sync($request->related);

            if ($request->hasFile('image')) {

                $options = [
                    "resize" => [
                        "width" => "1024",
                        "height" => "null"
                    ],
                    "quality" => "70%",
                    "upsize" => true,
                    "thumbnails" => [
                        [
                            "name" => "medium",
                            "scale" => "50%"
                        ],
                        [
                            "name" => "small",
                            "scale" => "25%"
                        ],
                        [
                            "name" => "cropped",
                            "crop" => [
                                "width" => "300",
                                "height" => "250"
                            ]
                        ]
                    ]
                ];
                $options = json_decode(json_encode($options));

                $path = (new ImageHandler($request, 'posts', 'image', $options))->handle();
                $post->image->delete();
                $post->image()->create(['path' => $path, 'caption' => $request->caption]);
            } else {
                $post->image()->update(['caption' => $request->caption]);
            }

            $post = Post::findOrFail($post->id);

            $params = [
                'index' => 'article',
                'id'    => $post->id,
                'body'  => [
                    'doc'   => json_decode((new PostResource($post))->toJson(), true)
                ]
            ];
            $es = $this->repository->update($params);
            
            if ($current->status == PostStatus::DRAFT && $request->status == PostStatus::PUBLISH){
                
                $push = new PushNotification();
                $push->sendNotification($post->id,"Berita Terbaru", $post->title, env('STORAGE').'/'.$post->image->thumbnail('medium', 'path'), env('WEBSITE_URL').'/'.$post->url, "web");
            }

            activity()
                ->performedOn($post)
                ->event('update')
                ->withProperties(['data' => $post->with(['tags', 'image'])])
                ->log('update post');
        });

        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }

    public function bulk()
    {
        $posts = Post::query()->get();

        $params = ['body' => []];
        foreach ($posts as $post) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'article',
                    '_id'    => $post->id
                ]
            ];

            $params['body'][] = json_decode((new PostResource($post))->toJson(), true);

            if (count($params['body']) === 1000) {
                $responses = $this->repository->bulk($params);
                $params = ['body' => []];

                unset($responses);
            }
        }

        if (!empty($params['body'])) {
            $responses = $this->repository->bulk($params);
        }

        return redirect()->route('post.index')->with('message', 'Bulk Successfully');
    }

    public function search(Request $request)
    {
        return Post::select(['id', 'title as text'])->where('status', 'PUBLISH')->where('title', 'like', '%' . $request->q . '%')->limit(20)->get();
    }


    public function popup()
    {
        return view('popup.post');
    }

    public function analytic()
    {

        $client = new BetaAnalyticsDataClient([
            'credentials' => storage_path(env('ANALYTICS_CREDENTIALS_PATH')),
        ]);

        $response = $client->runReport([
            'property' => 'properties/'.env('ANALYTIC_PROPERTY_ID'),
            'dateRanges' => [
                new DateRange([
                    'start_date' => '7daysAgo',
                    'end_date' => 'today',
                ]),
            ],
            'dimensions' => [
                new Dimension(
                    [
                        'name' => 'pageTitle',
                    ]
                ),
                new Dimension(
                    [
                        'name' => 'pagePath',
                    ]
                ),
            ],
            'metrics' => [
                new Metric(
                    [
                        'name' => 'screenPageViews',
                    ]
                )
            ],
            'orderBys' => [
                new OrderBy(
                    [
                        'metric' => new MetricOrderBy(
                            [
                                'metric_name' => 'screenPageViews',
                            ]
                        ),
                        'desc' => true
                    ]
                ),
            ],
            'pageSize' => 10,

        ]);

        $data = [];
        foreach ($response->getRows() as $row) {
            $data[] = [
                'pageTitle' => $row->getDimensionValues()[0]->getValue(),
                'pagePath' => $row->getDimensionValues()[1]->getValue(),
                'screenPageViews' => $row->getMetricValue()[0]->getValue(),
            
            ];
            // [END analyticsdata_json_credentials_run_report_response]
        }

        return $data;
    }
}
