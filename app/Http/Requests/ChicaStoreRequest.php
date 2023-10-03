<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChicaStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=> 'required',
            'health_card_expiry_date' => 'nullable', // 'required
            'code_card' => 'unique:chicas|nullable',
            'ci' => 'required|unique:chicas',
            'phone' => 'required|unique:chicas',
            'age' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'El nombre es requerido',
            'code_card.unique' => 'El codigo de tarjeta ya existe',
            'ci.required' => 'El carnet de identidad es requerido',
            'ci.unique' => 'El carnet de identidad ya existe',
            'phone.required' => 'El numero de telefono es requerido',
            'phone.unique' => 'El numero de telefono ya existe',
            'age.required' => 'La edad es requerida',
            'image.required' => 'La imagen es requerida',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg,png,jpg,gif,svg',
            'image.max' => 'La imagen debe pesar menos de 2MB',
        ];
    }
}
