<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\ContentTypes\ImageHandler;
use App\Http\Resources\UserResource;
use App\Models\Image;
use App\Models\User;
use App\Repository\Elasticsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }

    use PasswordValidationRules;

    public function index()
    {
        return view('profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        if(auth()->user()->id != $id){
            return redirect()->back()->with('error', 'You are not authorized to edit this profile.');
        }

        if ($request->password) {
            Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                // 'email' => [
                //     'required',
                //     'string',
                //     'email',
                //     'max:255',
                //     Rule::unique(User::class),
                // ],
                'password' => $this->passwordRules(),
            ])->validate();
        }

        $user = User::find($id);
        $user->name = $request->name;
        if ($request->hasFile('image')) {

            $options = [
                "resize" => [
                    "width" => "1000",
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

            $path = (new ImageHandler($request, 'users', 'image', $options))->handle();
            $user->image->delete();
            $user->image()->create(['path' => $path]);
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->fresh();
        // $update = user::where('id', $id)->update([
        //     'name' => $request->name,
        // ]);

        $params = [
            'index' => 'user',
            'id'    => $user->id,
            'body'  => [
                'doc' => json_decode((new UserResource($user))->toJson(), true)
                ]
        ];
        $es = $this->repository->update($params);

        activity()
            ->performedOn(new User())
            ->event('udate')
            ->withProperties(['data' => $user])
            ->log('udate profile');

        return redirect()->route('profile.index')->with('message', 'Update Successfully');
    }
}
