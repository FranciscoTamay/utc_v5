<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirantes extends Model
{
    use HasFactory;
    protected $table = "aspirantes";
    protected $with=['carreras','procedencia'];
    protected $primaryKey = "id";
    protected $fillable = ['id',
    'folio',
    'nombres',
    'curp',
    'correo',
    'telefono',
    'localidad',
    'genero',
    'id_procedencia',
    'id_carrera',

];
public function procedencia(){
    return $this->belongsTo(Procedencias::class, 'id_procedencia');
}
public function carreras(){
    return $this->belongsTo(Carreras::class, 'id_carrera');
}
}
