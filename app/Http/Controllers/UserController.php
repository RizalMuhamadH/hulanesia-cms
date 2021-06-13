<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function index()
    {
        return view('user.index');
    }

    public function add()
    {
        $action = 'Add';

        return view('user.edit-add', ['action' => $action]);
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $user = user::findOrFail($id);

        $action = 'Edit';
        return view('user.edit-add', ['content' => $user, 'action' => $action]);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        // $update = user::where('id', $id)->update([
        //     'name' => $request->name,
        // ]);

        return redirect()->route('user.index')->with('message', 'Update Successfully');;
    }
}
