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
    <form id="frmServicios" method="POST" action="{{url("asp")}}">
    @csrf
    <!-- CASILLA DE DATO -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="number" name="folio" class="form-control" maxlength="50" placeholder="FOLIO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-n"></i></span>
        <input type="text" name="nombres" class="form-control" maxlength="50" placeholder="NOMBRES COMPLETOS" required>
        
    </div>
    <!-- FIN DE DATO -->
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-p"></i></span>
        <input type="text" name="apellido_p" class="form-control" maxlength="50" placeholder="APELLIDO PATERNO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-m"></i></span>
        <input type="text" name="apellido_m" class="form-control" maxlength="50" placeholder="APELLIDO MATERNO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-c"></i></span>
        <input type="text" name="curp" class="form-control" maxlength="50" placeholder="CURP COMPLETO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
        <input type="email" name="correo" class="form-control" maxlength="50" placeholder="CORREO ELECTRONICO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
        <input type="text" name="telefono" class="form-control" maxlength="50" placeholder="NUMERO TELEFONICO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-chart-area"></i></span>
        <input type="text" name="localidad" class="form-control" maxlength="50" placeholder="LOCALIDAD DEL ASPIRANTE" required>
        
    </div>
    <!-- FIN DE DATO -->

         <!-- CASILLA DE DATO -->
         <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-person"></i></span>
        <input type="text" name="genero" class="form-control" maxlength="50" placeholder="GENERO DEL ASPIRANTE" required>
        
    </div>
    <!-- FIN DE DATO -->

         <!-- CASILLA DE DATO -->
         <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-school"></i></span>
        <input type="text" name="id_procedencia" class="form-control" maxlength="50" placeholder="ESCUELA DE PROCEDENCIA" required>
        
    </div>
    <!-- FIN DE DATO -->

         <!-- CASILLA DE DATO -->
         <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-scroll"></i></span>
        <input type="text" name="id_carrera" class="form-control" maxlength="50" placeholder="CARRERA QUE DESEA CURSAR" required>
        
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



 <!-- COMIENZO DE LA CARD  TABLA -->
 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col"></div> 
            <!-- COMIENZO DE LA TABLA -->
    <div class="col-12 col-lg-8 offset-0 offset-lg-2"></div>
        <div class="table-responsive"></div>
        <table id="example230" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                <thead style="background-color:#6777ef" class=" text-center">
                    <tr>

                        <th scope="col"class="text-center text-black">FOLIO</th>
                        <th scope="col" class="text-center text-black">NOMBRES</th>
                        <th scope="col" class="text-center text-black">APELLIDOS PATERNO</th>
                        <th scope="col" class="text-center text-black">APELLIDOS MATERNO</th>
                        <th scope="col" class="text-center text-black">CURP</th>
                        <th scope="col" class="text-center text-black">CORREO</th>
                        <th scope="col" class="text-center text-black">TELEFONO</th>
                        <th scope="col" class="text-center text-black">LOCALIDAD</th>
                        <th scope="col" class="text-center text-black">GENERO</th>
                        <th scope="col" class="text-center text-black">ESC. PROCEDENCIA</th>
                        <th scope="col" class="text-center text-black">ASP. CARRERA</th>
                        <th scope="col" class="text-center text-black">EDITAR</th>
                        <th scope="col" class="text-center text-black">BORRAR</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($aspirantes as $row)
                    <tr>

                        <td class="text-center  fw-bold text-black">{{ $row->folio }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->nombres }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->apellido_p }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->apellido_m }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->curp }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->correo }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->telefono }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->localidad }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->genero }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->nombre_esc }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->nombre_carrera }}</td>


                        <td class="text-center">

                            <a  href="{{ url('asp', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>
                            </td>
           <td class="text-center  fw-bold fs-6" style="width:1%">
                            <form method="POST" action="{{ url('asp', [$row]) }}">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>

                    @endforeach()
                </tbody>
            </table>
        
        </div>
    </div>
    </div>
                    </div>
                </div>
            </div>
           

    </section>

@endsection