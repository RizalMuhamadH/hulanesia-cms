<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $image='nullable';
        $password='nullable';

        if ($this->hasFile('image')) {
            $image = 'mimes:' . config('filesystems.mimes') . '|between:0,' . config('filesystems.max_size') * 1024;
        }

        if ($this->password != null) {
            $password = ['required', 'string', new Password, 'confirmed'];
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'password' => $password,
            'image' => $image,
        ];
    }
}
