<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Funcionario extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
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
