<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'category_id' => 'nullable|integer|exists:categories, id',
            'published_at_from' => 'nullable:date_format:Y-m-d',
            'published_at_to' => 'nullable:date_format:Y-m-d',
            'likes_from' => 'nullable|integer',
            'likes_to' => 'nullable|integer'
        ];
    }
}
