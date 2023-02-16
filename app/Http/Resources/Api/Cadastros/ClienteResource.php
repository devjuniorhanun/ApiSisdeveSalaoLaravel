<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
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
            'nome' => $this->nome,
            'cpf_cnpj' => $this->cpf_cnpj,
            'rg_inscricao' => $this->rg_inscricao,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'logo' => $this->logo,
            'status' => $this->status,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
