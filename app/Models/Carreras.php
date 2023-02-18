<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    use HasFactory;


    protected $table = "carreras";
    protected $primaryKey = "id";
    protected $fillable=[
        'id',
        'codigo_carrera',
        'nombre_carrera',
        'id_plan'
    ];

    // public function plan(){
    //     return $this->belongsTo(Plan_Estudio::class, 'id_plan');
    // }
}
