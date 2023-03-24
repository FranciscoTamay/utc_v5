@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->

<div class="section">
    <div class="section-header">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="d-grid mx-auto">
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                                <i class="fa-solid fa-circle-plus"></i> Añadir
                            </button>
                        </div>
                    </div>
                    <div class="col-10 col-lg-10 offset-0 offset-lg-1">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>MATRICULA</th>
                                        <th>CURP</th>
                                        <th>APELLIDO PATERNO</th>
                                        <th>APELLIDO MATERNO</th>
                                        <th>NOMBRES</th>

                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @php $i=1; @endphp
                                    @foreach($matriculas as $run)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$run->matricula}}</td>
                                        <td>{{$run->curp}}</td>
                                        <td>{{$run->apellido_paterno}}</td>
                                        <td>{{$run->apellido_materno}}</td>
                                        <td>{{$run->nombres}}</td>

                                        <td>
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="{{ url('matriculas',[$run]) }}" class="btn btn-warning">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                </div>
                                                <!-- boton de editar -->

                                                <div class="col-4">
                                                    <form method="POST" action="{{ url('matriculas',[$run] )}}">
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
            </div>
        </div>
    </div>
</div>
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

                <form id="frmMatriculas" method="POST" action="{{ url('matriculas') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="matricula" class="form-control" maxlength="50" placeholder="Matricula del Estudiante" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control" name="id_alumno" id="">
                            <option value="">Alumnos</option>
                            @foreach($alumnos as $row)
                            <option value="{{$row->id}}">{{$row->curp}}</option>
                            @endforeach
                        </select>
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