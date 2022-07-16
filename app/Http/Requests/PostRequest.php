<?php

namespace App\Http\Requests;

use App\Enums\PostStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class PostRequest extends FormRequest
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

        $image = 'nullable';
        $related = 'nullable';
        $status = 'nullable';

        if ($this->hasFile('image')) {
            $image = 'mimes:' . config('filesystems.mimes') . '|between:0,' . config('filesystems.max_size') * 1024;
        }

        if ($this->has('related')) {
            $related = ['array', 'min:1', 'max:10'];
        }

        if ($this->has('status')) {
            $status = ['required', new Enum(PostStatus::class)];
        }

        return [
            'title' => 'required|max:150',
            'slug' => '',
            'description' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required|integer',
            'image' => $image,
            'tags' => ['required', 'array', 'min:3', 'max:5'],
            'source' => 'nullable',
            'source_link' => 'nullable',
            'status' => $status,
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'seo_title' => 'nullable',
            'author_id' => 'nullable',
            'related' => $related,
            'caption' => 'nullable',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => str($this->input('title'))->slug('-'),
        ]);
    }
}
