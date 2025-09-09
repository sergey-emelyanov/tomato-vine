<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'tag' => 'nullable|string',
            'author' => 'nullable|string',
            'body' => 'nullable|string',
            'comments' => 'nullable|string',
            'category' => 'nullable|string',
            'likes' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'published_at' => 'date_format:Y-m-d'
        ];
    }
}
