<?php

namespace App\Services;

use App\Http\Resources\PhotoResource;
use App\Models\Photo;
use App\Repository\Elasticsearch;
use App\Repository\PhotoRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class PhotoService
{
    private $photoRepository;
    private $elasticsearch;
    public function __construct(PhotoRepository $photoRepository, Elasticsearch $elasticsearch)
    {
        $this->photoRepository = $photoRepository;
        $this->elasticsearch = $elasticsearch;
    }

    public function add()
    {
        return $this->photoRepository->add();
    }

    public function store($request)
    {

        DB::beginTransaction();
        try {
            $photo = $this->photoRepository->store($request);

            $params = [
                'index' => 'photo',
                'id'    => $photo->id,
                'body'  => json_decode((new PhotoResource($photo))->toJson(), true)
            ];
            $es = $this->elasticsearch->create($params);

            activity()
                ->performedOn($photo)
                ->event('store')
                ->withProperties(['data' => $photo->with(['tags', 'image'])])
                ->log('store photo');

            DB::commit();
            return $photo;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->photoRepository->edit($id);
    }

    public function update($request, Photo $photo)
    {
        try {
            $photo =  $this->photoRepository->update($request, $photo);

            $params = [
                'index' => 'photo',
                'id'    => $photo->id,
                'body'  => ['doc' => json_decode((new PhotoResource($photo))->toJson(), true)]
            ];
            $es = $this->elasticsearch->update($params);

            activity()
                ->performedOn($photo)
                ->event('update')
                ->withProperties(['data' => $photo->with(['tags', 'image'])])
                ->log('update photo');

            DB::commit();
            return $photo;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function bulk()
    {
        $photos = $this->photoRepository->all();
        $params = ['body' => []];
        foreach ($photos as $photo) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'photo',
                    '_id'    => $photo->id
                ]
            ];

            $params['body'][] = json_decode((new PhotoResource($photo))->toJson(), true);

            if (count($params['body']) === 1000) {
                $responses = $this->elasticsearch->bulk($params);
                $params = ['body' => []];

                unset($responses);
            }
        }

        if (!empty($params['body'])) {
            $responses = $this->elasticsearch->bulk($params);
        }
    }
}
