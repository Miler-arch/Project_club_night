<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoCreateRequest extends FormRequest
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
            'nombre' => 'required|unique:productos',
            'costo' => 'required',
            'precio' => 'required',
            'costo_compania' => 'required',
        
     
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre del producto es requerido', 
            'nombre.unique' => 'El nombre del producto ya ha sido registrado',
            'costo.required' => 'El campo costo es requerido',
            'precio.required' => 'El campo precio es requerido',
            'costo_compania.required' => 'El campo costo compañia es requerido'
              
        ];
    }
}
