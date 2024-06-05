<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
            'direccion' => ['required'],
            'latitud' => ['required'],
            'longitud' => ['required'],
            'poblacion' => ['required'],
            'provincia' => ['required'],
            'comunidad' => ['required'],
            'email_usuario' => ['required','regex:/^[a-zA-Z0-9.]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/']
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'direccion.required' => 'La direccion es obligatoria',
            'latitud.required' => 'La latitud es obligatoria',
            'longitud.required' => 'La longitud es obligatoria',
            'poblacion.required' => 'La poblacion es obligatoria',
            'provincia.required' => 'La provincia es obligatoria',
            'comunidad.required' => 'La comunidad es obligatoria',
            'email_usuario.required' => 'El email es obligatorio',
            'email_usuario.regex' => 'El formato del email no es valido',
        ];
    }
}
