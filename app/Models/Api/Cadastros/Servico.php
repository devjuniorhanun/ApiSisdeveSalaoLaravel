<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companhia_id',
        'funcionario_id',
        'nome_servico',
        'valor',
        'status',
    ];

    public function agendamentos()
    {
        return $this->hasMany(\App\Models\Api\Servicos\Agendamento::class);
    }

    public function companhia()
    {
        return $this->belongsTo(Companhia::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
