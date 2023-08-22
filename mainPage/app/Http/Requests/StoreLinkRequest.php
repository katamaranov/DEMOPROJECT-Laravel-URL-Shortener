<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLinkRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'lnk' => 'required|url',
            'dop' => 'nullable|unique:links,slug|max:19|regex:"^[a-zA-Z_-]{1,}$"',
        ];
    }

    public function messages(): array
{
    return [
        'lnk.url' => 'Введите корректную ссылку',
        'lnk.required' => 'Введите ссылку',
        'dop.unique' => 'Введите уникальное имя ссылки',
        'dop.regex' => 'Введите корректное имя ссылки',
        'dop.max' => 'Максимальная длина - 19 символов',
    ];
}
}
