@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->

<div class="section">
    <div class="section-header">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIN DEL CARD DEL SECTION (ES PARA QUE NO SE VEA TAN PEGADO AL HEADER ) -->
<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="d-grid mx-auto">
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                <i class="fa-solid fa-circle-plus"></i> Añadir
            </button>
        </div>
    </div>
    </div>
    <!-- aqui es en donde termina el boton para abrir el modal de carreras -->

    <div class="row mt-3">
        <div class="col-10 col-lg-10 offset-0 offset-lg-1">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CODIGO</th>
                        <th>SEXO</th>
                        <th>APELLIDO PATERNO</th>
                        <th>APELLIDO MATERNO</th>
                        <th>NOMBRES</th>
                        <th>CURP</th>
                        <th>NSS</th>
                        <th>RFC</th>
                        <th>ID GRADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($maestros as $run)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$run->codigo}}</td>
                        <td>{{$run->sexo}}</td>
                        <td>{{$run->apellido_paterno}}</td>
                        <td>{{$run->apellido_materno}}</td>
                        <td>{{$run->nombres}}</td>
                        <td>{{$run->curp}}</td>
                        <td>{{$run->num_seguro}}</td>
                        <td>{{$run->rfc}}</td>
                        <td>{{$run->id_grado}}</td>
                        
                        
                        <td>
                            <div class="row">
                                <div class="col-6">
                            <a href="{{ url('maestros',[$run]) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i>
                            </a>
                                </div>
                            <!-- boton de editar -->

                            <div class="col-6">
                            <form method="POST" action="{{ url('maestros',[$run] )}}">
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
    </div>
    <!-- Aqui es en donde termina la tabla de las carreras -->
    <!-- Aqui empieza la ventana modal  -->
    <!-- Modal -->
<div class="modal fade" id="modalCarreras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar una carrera</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="frmMaestros" method="POST" action="{{ url('maestros') }}">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="curp" class="form-control" maxlength="50" placeholder="CURP del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="num_seguro" class="form-control" maxlength="120" placeholder="NSS del alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="apellido_paterno" class="form-control" maxlength="120" placeholder="Apellido Paterno del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="apellido_materno" class="form-control" maxlength="120" placeholder="Apellido Materno del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="nombres" class="form-control" maxlength="120" placeholder="Nombres del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <!-- <input type="text" name="sexo" class="form-control" maxlength="120" placeholder="Nombres del Alumno" required> -->
            <select name="sexo" id="" class="form-control" required>
            <option value="">Seleccione su sexo</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="telefono" class="form-control" maxlength="120" placeholder="Número del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="email" name="correo" class="form-control" maxlength="120" placeholder="Correo del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="direccion" class="form-control" maxlength="120" placeholder="Direccion del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="localidad" class="form-control" maxlength="120" placeholder="Localidad del Alumno" required>
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="municipio" class="form-control" maxlength="120" placeholder="Municipio del Alumno" required>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    <!-- Aqui termina la ventana modal -->
<!-- Aqui finaliza el contenido -->
@endsection

@section('page_js')
@endsection()
