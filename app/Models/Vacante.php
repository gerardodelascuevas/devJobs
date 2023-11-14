<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['dia'];

    protected $fillable = [
        'titulo', 'salario_id', 'categoria_id', 'empresa', 'dia', 'descripcion', 'imagen', 'user_id'
    ];
}
