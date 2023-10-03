<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'name' => 'required',
            'username' => ['required', 'min:4', 'unique:users,username,' . $user->id],
            'email' => [
                'required', 'unique:users,email,' . request()->route('user')->id
            ],
            'password' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'username.required' => 'El campo nombre de usuario es requerido',
            'username.unique' => 'El nombre de usuario ya ha sido registrado',
            'username.min' => 'El nombre de usuario debe contener mínimo 4 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.unique' => 'El correo electrónico ya ha sido registrado'
        ];
    }

}
