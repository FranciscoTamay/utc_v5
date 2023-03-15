<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_pagos extends Model
{
    use HasFactory;
    protected $table = "registro_pagos";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'id_servicio',
        'id_matricula',
        'estado',
        'created_at',
    ];

}
