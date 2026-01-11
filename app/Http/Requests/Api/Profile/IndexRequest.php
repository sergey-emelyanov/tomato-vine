<?php

namespace App\Http\Requests\Api\Profile;

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
            'user_id' => 'nullable|exists:user,id',
            'name' => 'nullable|string',
            'gender' => 'nullable|string|in:male,female',
            'country' => 'nullable|string',
            'birthday_from' => 'nullable|date_format:Y-m-d H:i:s',
            'birthday_to' => 'nullable|date_format:Y-m-d H:i:s'
        ];
    }
}
