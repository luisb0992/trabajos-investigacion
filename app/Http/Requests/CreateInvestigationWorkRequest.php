<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvestigationWorkRequest extends FormRequest
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
        // dd($this->all());
        if ($this->method() === 'PUT') {
            return [
                'title' => 'required|string',
                'file' => 'nullable',
                'line_id' => 'required|exists:lines,id',
                'area_id' => 'required|exists:areas,id',
                'authors' => 'required|array',
            ];
        }

        // si es un create
        if ($this->method() === 'POST') {
            return [
                'title' => 'required|string',
                'file' => 'required|file',
                'line_id' => 'required|exists:lines,id',
                'area_id' => 'required|exists:areas,id',
                'authors' => 'required|array',
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El título es requerido',
            'file.required' => 'El archivo es requerido',
            'file.file' => 'El archivo debe ser un formato valido (pdf)',
            'line_id.required' => 'La línea es requerida',
            'line_id.exists' => 'La línea no existe',
            'area_id.required' => 'El área es requerida',
            'area_id.exists' => 'El área no existe',
            'authors.required' => 'Los autores son requeridos',
            'authors.array' => 'Los autores deben ser un arreglo',
        ];
    }
}
