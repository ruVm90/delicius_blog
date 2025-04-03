<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * Validaciones para las recetas
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|min:10',
            'difficulty' => 'required|string|in:Facil,Medio,Dificil',
            'category_id' => 'required|integer',
            'ingredients' => 'required|array|min:1', // Debe ser un array y tener al menos un ingrediente
            'ingredients.*' => 'required|string|max:255', // Cada ingrediente debe ser un string válido
        ];
    }
}
