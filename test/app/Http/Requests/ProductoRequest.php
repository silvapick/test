<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'min:5|max:100|required',
            'referencia' => 'min:3|max:15|required',
            'precio' => 'min:1|required|numeric',
            'peso' => 'min:1|required|numeric',
            'categoria' => 'required',
            'stock' => 'min:1|required|numeric'
        ];
    }
}
