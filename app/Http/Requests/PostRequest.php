<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Models\User;
use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content' => ['bail','required','string',new Uppercase],
        ];
    }

    public function messages(){
        return [
            'content.required' => 'Please enter content',
        ];
    }
}
