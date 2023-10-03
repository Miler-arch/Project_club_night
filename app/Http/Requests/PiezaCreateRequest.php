<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PiezaCreateRequest extends FormRequest
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
            'nombre_chica' => 'required',
            'tiempo' => 'required',
            'hora_ingreso' => 'required',
            'hora_salida' => 'required',
            'ingreso' => 'required',
        ];
    }
}
