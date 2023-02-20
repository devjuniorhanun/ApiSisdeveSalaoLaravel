<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'companhia_id' => ['required', 'string'],
            'nome' => ['string', 'unique:funcionarios,nome'],
        ];
    }
}
