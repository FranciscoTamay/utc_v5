<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_pagos extends Model
{
    use HasFactory;
    protected $table = "registro_pagos";
    // Aqui definimos el nombre de la tabla
    protected $primaryKey = "id";
    // Aqui definimos la llave foranea.
    protected $fillable = ['id',
        'id_servicio',
        'id_matricula',
        'estado',
        'created_at'
  
    ];
    // Aqui en un array definimos todos los campos en la base de datos 
    // incluyendo los llaves foraneas.


    // Lo que podemos observar en este archivo php el cual lo que hace es hacer
    // el modelo de cómo es la tabla en la base de datos, este lo usamos para 
    // para que junto con el controlador pueda haber la comunicación en la 
    // base de datos, cabe recalcar que en estos modelos se debe de poner 
    // de igual forma como está definido en cada uno de los campos incluyendo
    // las llaves foráneas, para que pueda funcionar, de lo contrario 
    // al momento de hacer las pruebas para verificar que se guarde los datos 
    // o se hagan actualizaciones los cambios no se efectuarán y como en este
    // proyecto no se usa JavaScript este es el que usamos
    // para que el controlador sepa en que tabla va a guardar todos los datos.

}
