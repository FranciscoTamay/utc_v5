@extends('layouts.app')
@section('content')
<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4"></div> 
                                    <!-- esta madre nada mas es una espacio en blanco para centrar col-md- y el perro tamaño que quieras jsjsjjs -->
                                    <div class="col-md-4 col-sm-1">
                                    <div class="accordion" id="accordionExample">
                                       
                             <!-- AGREGAR SERVICIO -->
<div class="row"></div>                  
 <div class="accordion-item ">
    <h2 class="accordion-header bg-success" id="headingTwo">
      <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h1><i class="fa-solid fa-address-book"></i></h1><span>
                   <h5> AGREGAR UN REGISTRO DE ASPIRANTE NUEVO</h5>
      </button>
      
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body ">
       <!-- FORMULARIO PARA AGREGAR -->

       <div class="modal-body">
    <form id="frmServicios" method="POST" action="{{url("aspirante")}}">
    @csrf
    <!-- CASILLA DE DATO -->
    <label class="form-label">FOLIO </label>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="number" name="folio" class=" form-control" maxlength="50" placeholder="FOLIO" required>
        
                
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">NOMBRES COMPLETOS</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-n"></i></span>
        <input type="text" name="nombres" class="form-control" maxlength="50" placeholder="NOMBRES COMPLETOS" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">APELLIDO PATERNO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-p"></i></span>
        <input type="text" name="apellido_p" class="form-control" maxlength="50" placeholder="APELLIDO PATERNO" required>
        
    </div>
    <!-- FIN DE DATO -->

    <label  class="form-label">APELLLIDO MATERNO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-m"></i></span>
        <input type="text" name="apellido_m" class="form-control" maxlength="50" placeholder="APELLIDO MATERNO" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">CURP COMPLETO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-c"></i></span>
        <input type="text" name="curp" class="form-control" maxlength="50" placeholder="CURP COMPLETO" required>
        
    </div>
    <!-- FIN DE DATO -->

    <label  class="form-label">CORREO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
        <input type="email" name="correo" class="form-control" maxlength="50" placeholder="CORREO ELECTRONICO" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">TELEFONO</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
        <input type="text" name="telefono" class="form-control" maxlength="50" placeholder="NUMERO TELEFONICO" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">LOCALIDAD</label>
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-chart-area"></i></span>
        <input type="text" name="localidad" class="form-control" maxlength="50" placeholder="LOCALIDAD DEL ASPIRANTE" required>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">GENERO</label>
         <!-- CASILLA DE DATO -->
         <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-person"></i></span>
        <!-- <input type="text" name="genero" class="form-control" maxlength="50" placeholder="GENERO DEL ASPIRANTE" required> -->
        <select name="genero" id="" class="form-control">
            <option value="" >Seleccione su genero</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            
        </select>
        
    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">PROCEDENCIA</label>
         <!-- CASILLA DE DATO -->
         <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-school"></i></span>
                        <select name="id_procedencia" class="proce form-control" required>
                            <option value="">SELECCIONA LA PROCEDENCIA</option>
                            @foreach($procedencias as $row)
                            <option value="{{$row->id}}">{{$row->nombre_esc}}</option>
                            @endforeach

                        </select>
                    </div>
    <!-- FIN DE DATO -->
    <label  class="form-label">CARRERA</label>
   <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-scroll"></i></i></span>
                        <select name="id_carrera" class="proce form-control" required>
                            <option value="">SELECCIONA LA CARRERA</option>
                            @foreach($carreras as $row)
                            <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
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
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>



@endsection
@section('page_js')
<script>
    // Empieza select 2
    $(document).ready(function() {
        $('.proce').select2();
    });
</script>

@endsection()