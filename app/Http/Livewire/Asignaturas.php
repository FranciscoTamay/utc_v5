<?php

namespace App\Http\Livewire;

use App\Models\Asignaturas as asignatura;
use Livewire\Component;

class Asignaturas extends Component
{
      //Definimos las variABLES
      public $asig, $codigo_asignatura, $nombre_asignatura, $num_unidades, $horas, $id_asignaturas;
      public $modal = false;

    public function render()
    {
        $this-> asig = asignatura::all();
        return view('livewire.asignaturas');
    }
    
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
     
   
    }

    public function abrirModal(){
     $this->modal= true;
    }

    public function cerrarModal(){
        $this->modal= false;
       }

       public function LimpiarCampos(){
        $this->codigo_asignatura= '';
        $this->nombre_asignatura= '';
        $this->num_unidades= '';
        $this->horas= '';
       }
}
