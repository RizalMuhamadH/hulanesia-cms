<?php

namespace App\Repository;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PhotoRepository
{

    public function all()
    {
        return Photo::query()->get();
    }

    public function add()
    {
        $action = 'Add';
        $users = User::get();

        return [
            'action' => $action,
            'users' => $users
        ];
    }

    public function store($request)
    {
        $photo = Photo::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'admin_id' => Auth::user()->id
        ]);

        foreach ($request->images as $key => $value) {
            $images[] = ['path' => $value, 'caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source];
        }

        $photo->images()->createMany([...$images]);

        return $photo;
    }

    public function edit($id)
    {
        $photo = Photo::with(['images'])->findOrFail($id);

        $users = User::get();

        $action = 'Edit';

        return [
            'action' => $action,
            'content' => $photo,
            'users' => $users
        ];
    }

    public function update($request, Photo $photo)
    {
        $photo->update([

            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description
        ]);

        $collection = collect($request->images);

        $imagesOld = $collection->filter(function ($value, $key) {
            return str()->startsWith($value, env('STORAGE'));
        });

        $imagesNew = $collection->reject(function ($value, $key) {
            return str()->startsWith($value, env('STORAGE'));
        });

        foreach ($photo->images as $image) {
            if (!$imagesOld->contains(fn($value, $key) => Str::replace(env('STORAGE') , '', $value) == $image->path)) {
                $image->delete();
            }
        }

        if ($imagesNew->count() > 0) {
            foreach ($imagesNew as $key => $value) {
                $images[] = ['path' => $value, 'caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source];
            }
            $photo->images()->createMany([...$images]);
        } else {
            $photo->images()->update(['caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source]);
        }

        return $photo->fresh();
    }
}
