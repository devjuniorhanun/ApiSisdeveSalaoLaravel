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
            'companhia' => $this->companhia,
            'nome' => $this->nome,
            'status' => $this->status,
        ];
    }
}
