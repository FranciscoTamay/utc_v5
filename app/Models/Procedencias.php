<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedencias extends Model
{
    use HasFactory;
    protected $table = "procedencia";
    protected $primaryKey = "id";
    protected $fillable = ['id',
    'nombre_esc'

];
}
