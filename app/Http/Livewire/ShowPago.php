<?php

namespace App\Http\Livewire;
use App\Models\Registro_pagos;
use Livewire\Component;

class ShowPago extends Component
{
    public $id_servicio;
    public $id_matricula;
    public $estado;
// AQUI RENDERIZAMOS LA VISTA QUE SE UTILIZARA PARA EL FORMULARIO 
    protected $rules =[
      'id_servicio'  => 'required',
      'id_matricula'  => 'required',
      'estado'  => 'required',
    ];

    protected $messages = [
      
        'id_servicio.required' => 'RELLENA ESTE CAMPO',


        'id_matricula.required' => 'RELLENA ESTE CAMPO',


        'estado.required' => 'RELLENA ESTE CAMPO',
 
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function render()
    {
        return view('servicios.pagoserv');
    }
}
