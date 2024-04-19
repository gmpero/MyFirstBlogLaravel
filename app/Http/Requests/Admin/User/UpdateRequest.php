<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer'
        ];
    }

    public function message()
    {
        return[
            'name.required' => 'Это поле необходимо заполнить',
            'name.string' => 'Поле должно быть строкой',
            'email.required' => 'Это поле необходимо заполнить',
            'email.string' => 'Email должен быть строкой',
            'email.email' => 'Ваша почта должна соответствовать формату mail@some.domain',
            'email.unique' => 'Пользователь с таким email уже существует',
        ];
    }
}
