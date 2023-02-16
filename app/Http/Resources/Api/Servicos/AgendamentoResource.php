<?php

namespace App\Http\Resources\Api\Servicos;

use Illuminate\Http\Resources\Json\JsonResource;

class AgendamentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'empresa_id' => $this->empresa_id,
            'companhia_id' => $this->companhia_id,
            'funcionario_id' => $this->funcionario_id,
            'cliente_id' => $this->cliente_id,
            'servico_id' => $this->servico_id,
            'uuid' => $this->uuid,
            'data_agendamento' => $this->data_agendamento,
            'horario_agendamento' => $this->horario_agendamento,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
