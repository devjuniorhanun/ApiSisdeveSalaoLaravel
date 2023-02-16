<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class CompanhiaUpdateRequest extends FormRequest
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
            'uuid' => ['required'],
            'nome' => ['string', 'unique:companhias,nome'],
            'latitude' => ['string'],
            'longitute' => ['string'],
            'telefone' => ['string'],
            'logo' => ['string'],
            'social_link' => ['string'],
            'status' => ['required', 'in:ATIVA,DESATIVADA'],
            'softdeletes' => ['required'],
        ];
    }
}