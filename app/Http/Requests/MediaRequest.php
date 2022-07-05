<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'caption' => 'nullable',
            'photographer' => 'nullable',
            'source' => 'nullable',
            'image' => 'mimes:' . config('filesystems.mimes') . '|between:0,' . config('filesystems.max_size') * 1024
        ];
    }
}
