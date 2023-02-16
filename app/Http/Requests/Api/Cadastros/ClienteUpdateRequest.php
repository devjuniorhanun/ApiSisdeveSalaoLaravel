<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateRequest extends FormRequest
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
            'nome' => ['string', 'unique:clientes,nome'],
            'cpf_cnpj' => ['string', 'unique:clientes,cpf_cnpj'],
            'rg_inscricao' => ['string', 'unique:clientes,rg_inscricao'],
            'email' => ['email'],
            'telefone' => ['string'],
            'logo' => ['string'],
            'status' => ['required', 'in:ATIVO,DESATIVADO'],
            'softdeletes' => ['required'],
        ];
    }
}
