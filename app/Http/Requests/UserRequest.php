<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nombre' => ['required', 'regex:/^[a-zA-Z\s]{1,}$/'],
            'email' => ['required','regex:/^[a-zA-Z0-9.]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'password' => ['regex:/^.{8,}$/'],
            'poblacion' => ['required'],
            'provincia' => ['required'],
            'comunidad' => ['required'],
            'nick' => ['required']
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.regex' => 'El campo nombre solo puede contener letras y espacios',
            'email.required' => 'El email es obligatorio',
            'email.regex' => 'El formato del email no es valido',
            'password.regex' => 'La contraseña debe tener al menos 8 caracteres',
            'poblacion.required' => 'La poblacion es obligatoria',
            'provincia.required' => 'La provincia es obligatoria',
            'comunidad.required' => 'La comunidad es obligatoria',
            'nick.required' => 'El nick es obligatorio'
        ];
    }
}
