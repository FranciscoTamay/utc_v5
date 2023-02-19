@extends('layouts.app')
@section('content')
<h6 class="m-b-0 text-right"><a href="/asp" class="text-warning"><button class="text-warning alert-warning" >CANCELAR</button> </a></h6>
<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">  
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div style="background-color:#9b9b00" class="card-header  text-white"> EDITAR ASPIRANTE</div>
       <div class="modal-body">
       <form id="frmServicios" method="POST" action="{{url("asp",[$aspirante])}}">
        @csrf
    @method('PUT')
    <!-- CASILLA DE DATO -->
    <label class="form-label">FOLIO</label>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="number" name="folio" class="form-control" maxlength="50" value="{{ $aspirante->folio}}" placeholder="FOLIO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <label  class="form-label">NOMBRES COMPLETOS</label>
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-n"></i></span>
        <input type="text" name="nombres" class="form-control" maxlength="50" value="{{ $aspirante->nombres}}" placeholder="NOMBRES COMPLETOS" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">APELLIDO PATERNO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-p"></i></span>
        <input type="text" name="apellido_p" class="form-control" maxlength="50" value="{{ $aspirante-> apellido_p}}" placeholder="APELLIDO PATERNO" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">APELLLIDO MATERNO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-m"></i></span>
        <input type="text" name="apellido_m" class="form-control" maxlength="50" value="{{ $aspirante-> apellido_m}}" placeholder="APELLIDO MATERNO" required>
        
    </div>
    <!-- FIN DE DATO -->

    <label  class="form-label">CURP COMPLETO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-c"></i></span>
        <input type="text" name="curp" class="form-control" maxlength="50" value="{{ $aspirante->curp }}" placeholder="CURP COMPLETO" required>
        
    </div>
    <!-- FIN DE DATO -->

    <label  class="form-label">CORREO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
        <input type="email" name="correo" class="form-control" maxlength="50" value="{{ $aspirante->correo }}" placeholder="CORREO ELECTRONICO" required>
        
    </div>
    <!-- FIN DE DATO -->

<label  class="form-label">TELEFONO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
        <input type="text" name="telefono" class="form-control" maxlength="50" value="{{ $aspirante->telefono }}" placeholder="NUMERO TELEFONICO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <label  class="form-label">LOCALIDAD</label>
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-chart-area"></i></span>
        <input type="text" name="localidad" class="form-control" maxlength="50" value="{{ $aspirante->localidad }}" placeholder="LOCALIDAD DEL ASPIRANTE" required>
        
    </div>
    <!-- FIN DE DATO -->

    <label  class="form-label">GENERO</label>
         <!-- CASILLA DE DATO -->
         <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-person"></i></span>
        <input type="text" name="genero" class="form-control" maxlength="50" value="{{ $aspirante->genero }}" placeholder="GENERO DEL ASPIRANTE" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">PROCEDENCIA</label>
         <!-- CASILLA DE DATO -->
         <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-school"></i></span>
                        <select name="id_procedencia" class="edtasp form-control" required>
                            <option value="">SELECCIONA LA PROCEDENCIA</option>
                            @foreach($procedencias as $row)
                            @if ($row->id == $aspirante->id_procedencia)
                            <option selected value="{{$row->id}}">{{$row->nombre_esc}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre_esc}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">CARRERA</label>
   <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-scroll"></i></i></span>
                        <select name="id_carrera" class="edtasp form-control" required>
                            <option value="">SELECCIONA LA CARRERA</option>
                            @foreach($carreras as $row)
                            @if ($row->id == $aspirante->id_carrera)
                            <option selected value="{{$row->id}}">{{$row->nombre_carrera}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
 
   
<div class="d-grid col-6 mx-auto">
    <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
</div>





    </form>

</div>

        <!-- FIN FORMULARIO PARA AGREGARR-->
        </div>
        </div>

    </div>

</div>
</section>


@endsection
@section('page_js')
        


            <script>
                $(document).ready(function() {
    $('.edtasp').select2();
});
            </script>
            @endsection()