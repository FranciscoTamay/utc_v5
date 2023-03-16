<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{
    use HasFactory;

    protected $table = "matriculas";
    protected $primaryKey = "id";
    protected $fillable=[
        'id',
        'matricula',
        'id_alumno'        
    ];
}
