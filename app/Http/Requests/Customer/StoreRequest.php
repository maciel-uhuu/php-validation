<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function messages()
    {
        return [
            'required' => 'O(a) :attribute é uma informação obrigatória',
            'string' => 'O(a) :attribute deve ser uma string',
            'email' => 'O (a):attribute não está formatado corretamente',
            'max' => 'O(a) :attribute deve ter no máximo o tamanho de :max caracteres',
            'min' => 'O(a) :attribute deve ter no mínimo o tamanho de :min caracteres',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
}
