@extends('layouts.app')
@section('content')
<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">  
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div style="background-color:#9b9b00" class="card-header  text-white"> EDITAR ESCUELA DE PROCEDENCIA</div>
        <div class="card-body">
        <form id="frmServicios" method="POST" action="{{url("procedencias",[$procedencia])}}">
    @method('PUT')
    @csrf
<!-- CASILLA DE DATO -->
<div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" name="nombre_esc" value="{{ $procedencia->nombre_esc }}" class="form-control" maxlength="50" placeholder="CODIGO SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->
   <!-- FIN DE DATO -->
   <div class="d-grid col-6 mx-auto">
    <button  class="btn btn-outline-warning"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
</div>
  


        </div>
        <div class="d-grid col-3 mx-auto">
                            <button class="btn btn-outline-info ">
                                <a href="/procedencias"></a>
                            <i class="fa-solid fa-arrow-left"></i> Regresar
                            </button>
                  
                        
                        </div>
    </div>

</div>
</div>
        </div>

    </div>

</div>

@endsection