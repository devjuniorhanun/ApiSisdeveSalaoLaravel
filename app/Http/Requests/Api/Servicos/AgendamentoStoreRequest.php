<?php

namespace App\Http\Requests\Api\Servicos;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentoStoreRequest extends FormRequest
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
            'cliente_id' => ['required', 'integer', 'exists:clientes,id'],
            'servico_id' => ['required', 'integer', 'exists:servicos,id'],
            'uuid' => ['required'],
            'data_agendamento' => ['date'],
            'horario_agendamento' => ['string'],
            'softdeletes' => ['required'],
        ];
    }
}
