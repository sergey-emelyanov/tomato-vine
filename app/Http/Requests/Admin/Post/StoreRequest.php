<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post.title' => 'required|string',
            'post.body' => 'nullable|string',
            'post.category_id' => 'required|integer|exists:categories,id',
            'post.likes' => 'nullable|integer',
            'post.files' => 'nullable',
            'tags' => 'nullable|string'
        ];
    }

    protected function prepareForValidation()
    {

        return $this->merge([
            'likes' => 0,
            'profile_id' => Auth::user()->id
        ]);
    }
}
