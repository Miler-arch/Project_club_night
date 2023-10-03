<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'ci' => 'required|unique:users|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|unique:users|numeric',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'El nombre es un campo requirido',
            'username.min'=>'El nombre de usuario debe contener mínimo 4 caracteres',
            'username.unique'=>'El nombre de usuario ya ha sido registrado',
            'username.required'=>'El nombre de usuario es un campo requirido',
            'email.required'=>'El correo electrónico es un campo requirido',
            'email.unique'=>'El correo electrónico ya ha sido registrado',
            'password.required'=>'La contraseña es un campo requirido',
            'ci.required'=>'La cédula de identidad es un campo requirido',
            'ci.unique'=>'La cédula de identidad ya ha sido registrada',
            'ci.numeric'=>'La cédula de identidad debe contener solo números',
            'photo.required'=>'La foto es un campo requirido',
            'photo.image'=>'La foto debe ser una imagen',
            'photo.mimes'=>'La foto debe ser un archivo de tipo: jpeg, png, jpg, gif',
            'photo.max'=>'La foto debe pesar máximo 2048 KB',
            'phone.required'=>'El teléfono es un campo requirido',
            'phone.unique'=>'El teléfono ya ha sido registrado',
            'phone.numeric'=>'El teléfono debe contener solo números',

        ];
    }
}
