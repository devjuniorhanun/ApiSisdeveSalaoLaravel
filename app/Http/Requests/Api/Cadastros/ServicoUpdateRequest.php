<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class ServicoUpdateRequest extends FormRequest
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
            'empresa_id' => ['required', 'integer', 'exists:empresas,id'],
            'companhia_id' => ['required', 'integer', 'exists:companhias,id'],
            'funcionario_id' => ['required', 'integer', 'exists:funcionarios,id'],
            'nome_servico' => ['string'],
            'valor' => ['numeric', 'between:-99999999.99,99999999.99'],
            'status' => ['required', 'in:ATIVO,DESATIVADO'],
            'softdeletes' => ['required'],
        ];
    }
}
