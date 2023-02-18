@extends('layouts.aspirantes')
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
      <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h1><i class="fa-solid fa-person"></i></h1><span>
                   <h5> AGREGAR UN REGISTRO DE ASPIRANTE NUEVO</h5>
      </button>
      
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body ">
       <!-- FORMULARIO PARA AGREGAR -->
       <div class="modal-body">
    <form id="frmServicios" method="POST" action="{{url("aspirantes")}}">
    @csrf
    <!-- CASILLA DE DATO -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" name="folio" class="form-control" maxlength="50" placeholder="FOLIO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
        <input type="text" name="nombre_serv" class="form-control" maxlength="50" placeholder="NOMBRE SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
        <input type="number" name="precio_serv" class="form-control" maxlength="50" placeholder="PRECIO DE SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->
 
   
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

</section>
@endsection