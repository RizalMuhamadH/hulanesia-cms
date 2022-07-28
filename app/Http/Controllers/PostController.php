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
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostListResource;
use App\Jobs\PostSchedule;
use App\Repository\Elasticsearch;
use App\Repository\PushNotification;
use App\Services\PostService;
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
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
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

        return view('post.edit-add', $this->postService->add());
    }

    public function store(PostRequest $request)
    {
        $post = $this->postService->store($request);

        if($post == false) {
            return redirect()->route('post.index')->with('error', 'Something went wrong');
        }

        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {

        return view('post.edit-add', $this->postService->edit($id));
    }

    public function update(PostRequest $request, Post $post)
    {

        $this->authorize('update', $post);

        $post = $this->postService->update($request, $post);

        if($post == false) {
            return redirect()->route('post.index')->with('error', 'Something went wrong');
        }

        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }

    public function bulk()
    {
        $this->postService->bulk();

        return redirect()->route('post.index')->with('message', 'Bulk Successfully');
    }

    public function search(Request $request)
    {
        return $this->postService->search($request->q, 20);
    }


    public function popup()
    {
        return view('popup.post');
    }

    // public function analytic()
    // {

    //     $client = new BetaAnalyticsDataClient([
    //         'credentials' => storage_path(env('ANALYTICS_CREDENTIALS_PATH')),
    //     ]);

    //     $response = $client->runReport([
    //         'property' => 'properties/' . env('ANALYTIC_PROPERTY_ID'),
    //         'dateRanges' => [
    //             new DateRange([
    //                 'start_date' => '90daysAgo',
    //                 'end_date' => 'today',
    //             ]),
    //         ],
    //         'dimensions' => [
    //             new Dimension(
    //                 [
    //                     'name' => 'pageTitle',
    //                 ]
    //             ),
    //             new Dimension(
    //                 [
    //                     'name' => 'pagePath',
    //                 ]
    //             ),
    //         ],
    //         'metrics' => [
    //             new Metric(
    //                 [
    //                     'name' => 'screenPageViews',
    //                 ]
    //             )
    //         ],
    //         'orderBys' => [
    //             new OrderBy(
    //                 [
    //                     'metric' => new MetricOrderBy(
    //                         [
    //                             'metric_name' => 'screenPageViews',
    //                         ]
    //                     ),
    //                     'desc' => true
    //                 ]
    //             ),
    //         ],
    //         'pageSize' => 10,

    //     ]);

    //     $data = [];
    //     foreach ($response->getRows() as $row) {
    //         $data[] = [
    //             'pageTitle' => $row->getDimensionValues()[0]->getValue(),
    //             'pagePath' => $row->getDimensionValues()[1]->getValue(),
    //             'screenPageViews' => $row->getMetricValues()[0]->getValue(),

    //         ];
    //         // [END analyticsdata_json_credentials_run_report_response]
    //     }

    //     return $data;
    // }
}
