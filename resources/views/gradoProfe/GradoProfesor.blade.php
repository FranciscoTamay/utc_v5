@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->
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
      <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <i class="fa-solid fa-money-bill-transfer"></i>     AGREGAR UN PROFESOR
      </button>
      
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body ">
       <!-- FORMULARIO PARA AGREGAR -->
       <div class="modal-body">

        <form id="frmGrados" method="POST" action="{{ url('grados') }}">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="codigo" class="form-control" maxlength="50" placeholder="Código del Profesor" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <!-- <input type="text" name="sexo" class="form-control" maxlength="120" placeholder="Nombres del Alumno" required> -->
            <select name="sexo" id="" class="form-control" required>
            <option value="">Seleccione el genero</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="apellido_paterno" class="form-control" maxlength="120" placeholder="Apellido Paterno del Profesor" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="apellido_materno" class="form-control" maxlength="120" placeholder="Apellido Materno del Profesor" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="nombres" class="form-control" maxlength="120" placeholder="Nombres del Profesor" required>
        </div>

        
        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="curp" class="form-control" maxlength="120" placeholder="CURP del Alumno" required>
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="num_seguro" class="form-control" maxlength="120" placeholder="NSS" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="rfc" class="form-control" maxlength="120" placeholder="RFC del Alumno" required>
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="id_grado" class="form-control" maxlength="120" placeholder="Grado del Profesor" required>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
        <div class="col-md-6 mx-auto">
        <button class="btn btn-outline-success btn-lg">
        <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>
        <!-- boton de guardar -->
        </div>
        </div>
        </form>
        <!-- final del formulario -->
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
    <div class="col-4 col-lg-4 offset-0 offset-lg-2"></div>
        <div class="table-responsive"></div>
        <table  id="example230" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                <thead  class="bg-secondary text-center">
                    <tr>

                  
                        <th>ID</th>
                        <th>GRADO PROFESOR</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($grados as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{$row->grado_nombre}}</td>
                        <td>
                            <div class="row">
                                <div class="col-4">
                            <a href="{{ url('maestros',[$row]) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i>
                            </a>
                                </div>
                            <!-- boton de editar -->

                            <div class="col-4">
                            <form method="POST" action="{{ url('maestros',[$row] )}}">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                            </form>
                            </div>
                            <!-- boton de eliminar -->
                            </div>
                        </td>                        
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Aqui es en donde termina la tabla de las carreras -->
    <!-- Aqui empieza la ventana modal  -->
   
@endsection

@section('page_js')
@endsection()
