<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Companhia extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'latitude',
        'longitute',
        'telefone',
        'logo',
        'social_link',
        'status',
    ];


    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }

}
