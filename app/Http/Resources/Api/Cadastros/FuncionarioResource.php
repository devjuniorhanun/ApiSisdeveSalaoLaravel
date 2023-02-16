<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Resources\Json\JsonResource;

class FuncionarioResource extends JsonResource
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
            'uuid' => $this->uuid,
            'nome' => $this->nome,
            'status' => $this->status,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
