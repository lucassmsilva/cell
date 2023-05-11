<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CelulaRelatorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'celula_id',
        'equipe',
        'membros',
        'visitantes',
        'frequentadores',
        'data',
        'valor_oferta',
        'tipo',
        'observacoes'
    ];
}
