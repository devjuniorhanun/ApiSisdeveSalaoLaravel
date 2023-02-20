<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanhiaResource extends JsonResource
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
            'latitude' => $this->latitude,
            'longitute' => $this->longitute,
            'telefone' => $this->telefone,
            'logo' => $this->logo,
            'social_link' => $this->social_link,
            'status' => $this->status,
        ];
    }
}
