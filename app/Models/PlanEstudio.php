<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEstudio extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $table = "plan_estudio";
    protected $primaryKey = "id";
    protected $fillable=[
        'id',
        'id_asignatura',
        'nombre_plan',
        'anio',
        'cuatrimestres',
        'horas'
    ];
}
