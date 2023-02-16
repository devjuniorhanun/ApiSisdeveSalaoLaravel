<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioUpdateRequest extends FormRequest
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
            'uuid' => ['required'],
            'nome' => ['string', 'unique:funcionarios,nome'],
            'status' => ['required', 'in:ATIVO,DESATIVADO'],
            'softdeletes' => ['required'],
        ];
    }
}
