<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
            'nombre' => ['required'],
            'imagen' => ['required'],
            'precio' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
            'paginas' => ['required','regex:/^\d+$/'],
            'id_autor' => ['required'],
            'generosLibro' => ['array'],
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'imagen.required' => 'La imagen es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.regex' => 'El precio debe ser un número con hasta dos decimales.',
            'paginas.required' => 'El número de páginas es obligatorio.',
            'paginas.regex' => 'El número de páginas debe ser un número entero.',
            'id_autor.required' => 'El id del autor es obligatorio.',
            'generosLibro.array' => 'Los géneros del libro deben ser un array.',
        ];
    }
}
