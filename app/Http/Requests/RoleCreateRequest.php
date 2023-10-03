<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
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
          
            'name' => 'required|unique:roles',
           
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El campo nombre del rol es requerido',
            'name.unique' => 'El nombre del rol que ingreso, ya ha sido registrado'
        ];
    }
}
