<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repository\Elasticsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }
    
    use PasswordValidationRules;

    public function index()
    {
        return view('user.index');
    }

    public function add()
    {
        $action = 'Add';
        $roles = Role::pluck('name','name')->all();
        return view('user.edit-add', ['action' => $action, 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => str($request->name)->slug()->studly(),
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->input('roles'));

        $params = [
            'index' => 'user',
            'id'    => $user->id,
            'body'  => json_decode((new UserResource($user))->toJson(), true)
        ];
        $es = $this->repository->create($params);

        activity()
            ->performedOn($user)
            ->event('store')
            ->withProperties(['data' => $user])
            ->log('store user');

        return redirect()->route('user.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $user = user::findOrFail($id);

        $action = 'Edit';

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('user.edit-add', ['content' => $user, 'action' => $action, 'roles' => $roles, 'userRole' => collect($userRole)]);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $request->validate([
                'password' => $this->passwordRules(),
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->syncRoles($request->input('roles'));
        // $update = user::where('id', $id)->update([
        //     'name' => $request->name,
        // ]);
        $user = $user->fresh();

        $params = [
            'index' => 'user',
            'id'    => $user->id,
            'body'  => [
                'doc' => json_decode((new UserResource($user))->toJson(), true)
                ]
        ];
        $es = $this->repository->update($params);

        activity()
            ->performedOn($user)
            ->event('update')
            ->withProperties(['data' => $user])
            ->log('update user');

        return redirect()->route('user.index')->with('message', 'Update Successfully');
    }

    public function loginAs($id)
    {
        $user = User::find($id);
        auth()->user()->impersonate($user);

        return redirect()->route('dashboard');
    }

    public function bulk()
    {
        $users = User::query()->get();

        $params = ['body' => []];

        foreach ($users as $user) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'user',
                    '_id' => $user->id
                ]
            ];

            $params['body'][] = json_decode((new UserResource($user))->toJson(), true);
        }

        $this->repository->bulk($params);

        return redirect()->route('user.index')->with('message', 'Bulk Successfully');
    }
}
