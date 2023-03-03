<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    use HasFactory;
    protected $table = "asignaturas";
    protected $primaryKey = "id";
    protected $fillable=[
        'id',
        'codigo_asignatura',
        'nombre_asignatura',
        'num_unidades',
        'horas'
    ];
}
