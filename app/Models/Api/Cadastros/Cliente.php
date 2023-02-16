<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'rg_inscricao',
        'email',
        'telefone',
        'logo',
        'status',
    ];

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }
}
