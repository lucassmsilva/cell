<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lider_id',
        'pastor_id',
    ];
}
