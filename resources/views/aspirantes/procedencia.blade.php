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
      <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa-solid fa-school"></i>
                          <h6>    NUEVA ESCUELA DE PROCEDENCIA</h6>
      </button>
      
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body ">
       <!-- FORMULARIO PARA AGREGAR -->
       <div class="modal-body">
    <form id="frmServicios" method="POST" action="{{url("procedencias")}}">
    @csrf
  
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-school"></i></span>
        <input type="text" name="nombre_esc" class="form-control" maxlength="50" placeholder="NOMBRE DE LA ESCUELA DE PROCEDENCIA" required>
        
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
<!-- COMIENZO DE LA CARD  TABLA -->
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col"></div> 
            <!-- COMIENZO DE LA TABLA -->
    <div class="col-12 col-lg-8 offset-0 offset-lg-2"></div>
        <div class="table-responsive">
            <table  id="example23" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                <thead class="bg-secondary text-center">
                <tr>
                    
        <th scope="col"class="text-center text-black" >ID</th>
        <th scope="col"class="text-center text-black" >NOMBRE DE LA ECUELA DE PROCEDENCIA</th>
        <th scope="col"class="text-center text-black" >FECHA DE CREACION</th>
        <th scope="col"class="text-center text-black" >ACCIONES</th>
    
    </tr>
                </thead>
                <tbody class="table-group-divider" >
                    @foreach($procedencias as $row)
                    <tr>
                        
                        <td  scope="col"class="text-center text-black fw-bold">{{ $row->id }}</td>
                        <td class="text-center  fw-bold text-black  ">{{ $row->nombre_esc }}</td>
                        <td class="text-center  fw-bold text-black text-success ">{{ $row->created_at }}</td>
                
                        <td class="text-center">

        <a href="{{ url('procedencias', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>
           <form method="POST" action="{{ url('procedencias', [$row]) }}">
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
            <!-- finaliza el reponsive table -->
</div>

<!-- FINDE LA TABLA -->
        </div>
    </section>

    <!-- FIN DE SECCION -->

@endsection
