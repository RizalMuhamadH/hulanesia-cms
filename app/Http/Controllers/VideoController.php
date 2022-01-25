<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use App\Models\Video;
use App\Repository\Elasticsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('video.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'Add';

        return view('video.edit-add',['action' => $action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = Video::create([
            'title' => $request->title,
            'vid' => $request->vid,
            'slug' => Str::slug($request->title, "-"),
            'description' => $request->description,
            'thumbnail' => 'https://i.ytimg.com/vi/'.$request->vid.'/maxresdefault.jpg',
            'status' => $request->status
        ]);

        $params = [
            'index' => 'video',
            'id'    => $video->id,
            'body'  => json_decode((new VideoResource($video))->toJson(), true)
        ];
        $es = $this->repository->create($params);

        activity()
            ->performedOn(new Video())
            ->event('store')
            ->withProperties(['data' => $video])
            ->log('store video');

        return redirect()->route('video.index')->with('message', 'Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $action = 'Edit';
        return view('video.edit-add',['action' => $action, 'content' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $video->update([
            'title' => $request->title,
            'vid' => $request->vid,
            'slug' => Str::slug($request->title, "-"),
            'description' => $request->description,
            'thumbnail' => 'https://i.ytimg.com/vi/'.$request->vid.'/maxresdefault.jpg',
            'status' => $request->status
        ]);

        $params = [
            'index' => 'video',
            'id'    => $video->id,
            'body'  => [
                'doc' => json_decode((new VideoResource($video))->toJson(), true)
                ]
        ];
        $es = $this->repository->update($params);

        activity()
            ->performedOn(new Video())
            ->event('update')
            ->withProperties(['data' => $video])
            ->log('update video');

        return redirect()->route('video.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }

    public function bulk()
    {
        $videos = Video::query()->get();

        $params = ['body' => []];

        foreach ($videos as $video) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'video',
                    '_id' => $video->id
                ]
            ];

            $params['body'][] = json_decode((new VideoResource($video))->toJson(), true);
        }

        $this->repository->bulk($params);

        return redirect()->route('video.index')->with('message', 'Bulk Successfully');
    }
}
