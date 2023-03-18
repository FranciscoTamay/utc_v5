<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoProfesor extends Model
{
    use HasFactory;

    protected $table = "grado_prof";
    protected $primaryKey = "id";
    protected $fillable=[
        'id',
        'grado_nombre'
    ];
}
