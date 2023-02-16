<?php

namespace App\Models\Api\Servicos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agendamento extends Model
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
        'cliente_id',
        'servico_id',
        'uuid',
        'data_agendamento',
        'horario_agendamento',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function companhia()
    {
        return $this->belongsTo(\App\Models\Api\Cadastros\Companhia::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(\App\Models\Api\Cadastros\Funcionario::class);
    }

    public function cliente()
    {
        return $this->belongsTo(\App\Models\Api\Cadastros\Cliente::class);
    }

    public function servico()
    {
        return $this->belongsTo(\App\Models\Api\Cadastros\Servico::class);
    }
}
