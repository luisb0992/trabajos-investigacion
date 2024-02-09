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
        if ($this->method() === 'PUT') {
            return [
                'title' => 'required|string|max:250',
                'file' => 'nullable|max:10240',
                'line_id' => 'required|exists:lines,id',
                'area_id' => 'required|exists:areas,id',
                'category_id' => 'required',
                'authors' => 'required|array',
                'methodology' => 'nullable|max:255',
                'es_summary' => 'nullable|max:2000',
                'en_summary' => 'nullable|max:2000',
                'email' => 'nullable|max:255',
                'profile' => 'nullable|max:255',
                'orcid_code' => 'nullable|max:255',
                'type' => 'nullable',
                'status' => 'nullable',
                'location' => 'nullable|max:255',
                'approach' => 'nullable|max:2000',
                'justification' => 'nullable|max:2000',
                'background' => 'nullable|max:2000',
                'general_objective' => 'nullable|max:2000',
                'specific_objective' => 'nullable|max:2000',
                'expected_results' => 'nullable|max:2000',
                'bibliography' => 'nullable|max:2000',
                'homeland_plans' => 'nullable|max:2000',
                'historical_objectives' => 'nullable|max:2000',
                'national_objectives' => 'nullable|max:2000',
                'strategic_objectives' => 'nullable|max:2000',
                'general_objectives' => 'nullable|max:2000',
                'relationship_objectives' => 'nullable|max:2000',
                'aspects' => 'nullable|array',
                'items' => 'nullable|array',
                'activities' => 'nullable|array',
            ];
        }

        // si es un create
        if ($this->method() === 'POST') {
            return [
                'title' => 'required|string|max:250',
                'file' => 'nullable|max:10240',
                'line_id' => 'required|exists:lines,id',
                'area_id' => 'required|exists:areas,id',
                'category_id' => 'required',
                'authors' => 'required|array',
                'methodology' => 'nullable|max:255',
                'es_summary' => 'nullable|max:2000',
                'en_summary' => 'nullable|max:2000',
                'email' => 'nullable|max:255',
                'profile' => 'nullable|max:255',
                'orcid_code' => 'nullable|max:255',
                'type' => 'nullable',
                'status' => 'nullable',
                'location' => 'nullable|max:255',
                'approach' => 'nullable|max:2000',
                'justification' => 'nullable|max:2000',
                'background' => 'nullable|max:2000',
                'general_objective' => 'nullable|max:2000',
                'specific_objective' => 'nullable|max:2000',
                'expected_results' => 'nullable|max:2000',
                'bibliography' => 'nullable|max:2000',
                'homeland_plans' => 'nullable|max:2000',
                'historical_objectives' => 'nullable|max:2000',
                'national_objectives' => 'nullable|max:2000',
                'strategic_objectives' => 'nullable|max:2000',
                'general_objectives' => 'nullable|max:2000',
                'relationship_objectives' => 'nullable|max:2000',
                'aspects' => 'nullable|array',
                'items' => 'nullable|array',
                'activities' => 'nullable|array',
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
            'title.max' => 'El título no debe sobrepasar los 250 caracteres',
            'file.required' => 'El archivo es requerido',
            'file.file' => 'El archivo debe ser un formato valido (pdf)',
            'category_id.required' => 'La categoria del proyecto  es requerida',
            'line_id.required' => 'La línea es requerida',
            'line_id.exists' => 'La línea no existe',
            'area_id.required' => 'El área es requerida',
            'area_id.exists' => 'El área no existe',
            'authors.required' => 'Los autores son requeridos',
            'authors.array' => 'Los autores deben ser un arreglo',
            'methodology.max' => 'La metodología no debe superar los 255 caracteres',
        ];
    }
}
