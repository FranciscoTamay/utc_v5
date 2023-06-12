
@extends('layouts.app')
@section('content')
<!-- ESTA VISTA ES PARA EDITAR UN SERVICIO EL CUAL ES UN FORMULARIO QUE RETORNA 
LOS DATOS DE LA FILA SELECCIONADA -->
<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">  
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div style="background-color:#9b9b00" class="card-header  text-white"> EDITAR SERVICIOS</div>
        <div class="card-body">
        <form id="frmServicios" method="POST" action="{{url("servicios",[$servicio])}}">
    @method('PUT')
    @csrf
<!-- CASILLA DE DATO -->
<div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" name="codigo_serv" value="{{ $servicio->codigo_serv }}" class="form-control" maxlength="50" placeholder="CODIGO SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
        <input type="text" name="nombre_serv" value="{{ $servicio->nombre_serv }}"class="form-control" maxlength="50" placeholder="NOMBRE SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
        <input type="number" name="precio_serv" value="{{ $servicio->precio_serv }}"class="form-control" maxlength="50" placeholder="PRECIO DE SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->

    <div class="d-grid col-6 mx-auto">
    <button  class="btn btn-outline-warning"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
</div>
<br>
      <!-- boton de REGRESAR -->
<div class="d-grid col-3 mx-auto">
                            <button class="btn btn-outline-info ">
                                <a href="/servicios"></a>
                            <i class="fa-solid fa-arrow-left"></i> Regresar
                            </button>
                  
                        
                        </div>
        </div>

    </div>

</div>
</div>
        </div>

    </div>

</div>

@endsection