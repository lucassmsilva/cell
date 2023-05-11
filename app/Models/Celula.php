<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'lider_id',
        'discipulador_id',
        'pastor_id',
        'predio_id',
        'data_nascimento',
        'parent_id'
    ];

    public function relatorios(){
        return $this->hasMany(CelulaRelatorio::class);
    }
}
