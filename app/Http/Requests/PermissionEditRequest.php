<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionEditRequest extends FormRequest
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
            'name' => 'required|unique:permissions'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del permiso es requerido',
            'name.unique' => 'El nombre del permiso ya ha sido registrado'
        ];
    }
}
