@extends('layouts.app')
@section('content')
<!-- AQUI EMPIEZA EL CONTENIDO -->
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
            <div class="table">
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ASINATURAS</th>
                        <th>NOMBRE PLAN</th>
                        <th>AÑO</th>
                        <th>CUATRIMESTRES</th>
                        <th>HORAS</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($planEstudios as $run)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$run->nombre_asignatura}}</td>
                        <td>{{$run->nombre_plan}}</td>
                        <td>{{$run->anio}}</td>
                        <td>{{$run->cuatrimestres}}</td>
                        <td>{{$run->horas}}</td>

                        <td>
                            <div class="row">
                                <div class="col-md-6">
                            <a href="{{ url('planEstudio',[$run]) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i>
                            </a>
                                </div>
                            <!-- boton de editar -->

                            <div class="col-md-6">
                            <form method="POST" action="{{ url('planEstudio',[$run] )}}">
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

        <form id="frmPlanEstudio" method="POST" action="{{ url('planEstudio') }}">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <!-- <input type="number" name="id_asignatura" class="form-control" maxlength="50" placeholder="Ingrese la Asigantura" required> -->
            <select class="form-control" name="id_asignatura" id="" required>
                <option value="">Asignaturas</option>
                @foreach($asignaturas as $row)
                <option value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="nombre_plan" class="form-control" maxlength="120" placeholder="Nombre del plan" required>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="anio" class="form-control" maxlength="50" placeholder="Año del Plan de Estudio" required>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="cuatrimestres" class="form-control" maxlength="50" placeholder="Cuatrimestres del Plan de Estudio" required>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="horas" class="form-control" maxlength="50" placeholder="Horas del Plan de Estudio" required>
        </div>

        <div class="d-gid col-6 mx-auto">
        <button class="btn btn-success">
        <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>
        <!-- boton de guardar -->
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
<!-- AQUI FINALIZA EL CONTENIDO -->
@endsection

@section('page_js')
@endsection()