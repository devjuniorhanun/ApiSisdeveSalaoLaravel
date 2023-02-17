<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companhia_id',
        'nome',
        'status',
    ];

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }

    public function companhia()
    {
        return $this->belongsTo(Companhia::class);
    }
}
