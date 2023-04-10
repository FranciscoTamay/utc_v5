<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;
    protected $table = "grupos";
    protected $primaryKey = "id";
    protected $fillable=[
        'id',
        'nombre_grupo',
        'id_matricula',
        'id_asignatura',
        'id_profesor',
        'id_carrera'
    ];
}

