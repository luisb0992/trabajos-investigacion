<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        // si es un update
        if ($this->method() === 'PUT') {
            return [
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
                'password' => ['nullable', 'string', 'min:8'],
                'rol_id' => ['required', 'integer'],
                'checked' => ['required', 'boolean'],
            ];
        }

        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'rol_id' => ['required', 'integer'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre debe tener máximo 255 caracteres',
            'name.min' => 'El nombre debe tener mínimo 3 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico debe ser un correo válido',
            'email.unique' => 'El correo electrónico ya existe',
            'password.required' => 'La contraseña es requerida',
            'password.string' => 'La contraseña debe ser una cadena de texto',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres',
            // 'password.confirmed' => 'La contraseña no coincide',
            'rol_id.required' => 'El rol es requerido',
            'rol_id.integer' => 'El rol debe ser un número entero',
            // 'rol_id.exists' => 'El rol no existe',
        ];
    }
}
