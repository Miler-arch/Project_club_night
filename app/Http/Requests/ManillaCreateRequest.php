<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManillaCreateRequest extends FormRequest
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
            'color' => 'required',
            'precio' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'color.required' => 'El campo color es requerido',
            'precio.required' => 'El campo precio es requerido'
        ];
    }
}
