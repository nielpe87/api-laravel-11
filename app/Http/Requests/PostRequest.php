<?php

namespace App\Http\Requests;

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
           'comment' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'O campo comment é obrigatório',
            'comment.min' => 'comment deve ter no mínimo 4 caracteres'
        ];
    }
}
