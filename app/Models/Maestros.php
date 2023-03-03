<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestros extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "maestros";
    protected $primaryKey = "id";
    protected $fillable=[
        'id',
        'codigo',
        'sexo',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'curp',
        'num_seguro',
        'rfc',
        'id_grado'        
    ];
}
