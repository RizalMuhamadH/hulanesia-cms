<?php

namespace App\Http\Controllers;

use App\Helpers\Meilisearch;
use App\Http\Controllers\ContentTypes\MultipleImageHandler;
use App\Http\Requests\PhotoRequest;
use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use App\Repository\Elasticsearch;
use App\Services\PhotoService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Models\Activity;

class PhotoController extends Controller
{
    private $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function index()
    {
        return view('photo.index');
    }

    public function add()
    {

        return view('photo.edit-add', $this->photoService->add());
    }

    public function store(PhotoRequest $request)
    {

        $photo = $this->photoService->store($request);

        if($photo === false) {
            return redirect()->route('photo.index')->withErrors(['error' => 'Error while storing photo']);
        }

        return redirect()->route('photo.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        return view('photo.edit-add', $this->photoService->edit($id));
    }

    public function update(PhotoRequest $request, Photo $photo)
    {
        $photo = $this->photoService->update($request, $photo);

        if($photo === false) {
            return redirect()->route('photo.index')->withErrors(['error' => 'Error while updating photo']);
        }

        return redirect()->route('photo.index')->with('message', 'Add Successfully');
    }

    public function bulk()
    {
        $this->photoService->bulk();

        return redirect()->route('photo.index')->with('message', 'Bulk Successfully');
    }
}
