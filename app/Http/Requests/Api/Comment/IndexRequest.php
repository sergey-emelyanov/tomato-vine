<?php

namespace App\Http\Requests\Api\Comment;

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
            'body' => 'nullable|string',
            'profile_id' => 'nullable|integer|exists:profiles,id',
            'likes_from' => 'nullable|integer',
            'likes_to' => 'nullable|integer'
        ];
    }
}
