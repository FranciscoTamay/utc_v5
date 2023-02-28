<?php

namespace App\Http\Livewire;
use App\Models\Servicios;
use Livewire\Component;

class ShowServicios extends Component
{

    public $codigo_serv;
    public $nombre_serv;
    public $precio_serv;


    protected $rules = [
        'codigo_serv' => 'required| unique:servicios',
        'nombre_serv' => 'required| unique:servicios',
        'precio_serv' => 'required',
    ];

    protected $messages = [
        'codigo_serv.unique' => 'ESTE REGISTRO YA EXISTE. NO PUEDES AGREGARLO',
        'codigo_serv.required' => 'RELLENA ESTE CAMPO',

        'nombre_serv.unique' => 'ESTE REGISTRO YA EXISTE. NO PUEDES AGREGARLO',
        'nombre_serv.required' => 'RELLENA ESTE CAMPO',

        'precio_serv.required' => 'RELLENA ESTE CAMPO',
 
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.show-servicios');
    }
    
}
