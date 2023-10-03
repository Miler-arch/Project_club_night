<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaCreateRequest extends FormRequest
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
            'numero_venta' => 'required',
            'user_id' => 'required',
            'total' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'numero_venta.required' => 'El campo numero de venta es requerido',
            'user_id.required' => 'El campo garzón es requerido',
            'total.required' => 'El campo total es requerido'
        ];
    }
}
