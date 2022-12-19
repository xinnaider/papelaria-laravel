<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoFormRequest extends FormRequest
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
            'nome' => 'required|string|max:255|min:3|unique:produtos',
            'marca' => [
                'required',
                'min:3',
                'max:15',
                'string',
            ],
            'estoque' => [
                'required',
                'min:1',
                'integer',
            ],
            'preco' => 'required'
        ];
    }
}
