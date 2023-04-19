<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


//Agregamos spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // lo que se puede observar aqui son los campos de la tabla de usuarios
    // son los que se van a llenar cuando se cree un nuevo usuario.

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // estos campos que se ven aqui por medio de protected $hidden
        // lo que va a hacer es encriptarlos para que estos se vean de forma 
        // diferente en la base de datos.
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // este es para verificar el correo y al momento de que se verifique
        // se crea los time stamps que son las marcas de tiempo de cuando accedio o
        // cuando se creo o se actualizaron sus datos.
    ];
}
