<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClienteFormRequest extends FormRequest
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
        // $id = $this->id ?? '';

        return [
            'nome' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email',
                "unique:clientes,email",
            ],
            'telefone' => [
                'required',
                'min:3',
                'max:15',
                'string',
            ],
            'cpf' => [
                'required',
                'min:3',
                'max:15',
                'string',
            ],
            'sexo' => 'required',
            'dataNascimento' => 'required'
        ];
    }
}
