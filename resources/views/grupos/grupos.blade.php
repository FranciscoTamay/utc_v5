@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->

<div class="section mt-4">
    <!-- FIN DEL CARD DEL SECTION (ES PARA QUE NO SE VEA TAN PEGADO AL HEADER ) -->

    <!-- aqui es en donde termina el boton para abrir el modal de carreras -->
    <div class="card-body">
        <h2 class="title-2">Grupos</h2>
        <div class="row mt-1 mb-5">
            <div class="col-md-4 offset-md-4">
                <div class="d-grid mx-auto">
                    <br>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                        <i class="fa-solid fa-circle-plus"></i> Añadir
                    </button>
                </div>
            </div>
        </div>
        <div class="respon table-responsive">
            <table id="pro" class="xd display responsive nowrap" style="width:95%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID MATRICULAS</th>
                        <th>ID ASIGNATURA</th>
                        <th>PROFESOR NOMBRES</th>
                        <th>APELLIDO PATERNO</th>
                        <th>APELLIDO MATERNO</th>
                        <th>ID CARRERA</th>
                        <th>ACCIONES</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($grupos as $run)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$run->matricula}}</td>
                        <td>{{$run->nombre_asignatura}}</td>
                        <td>{{$run->nombres}}</td>
                        <td>{{$run->apellido_paterno}}</td>
                        <td>{{$run->apellido_materno}}</td>
                        <td>{{$run->nombre_carrera}}</td>


                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ url('grupos',[$run]) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                <!-- boton de editar -->

                                <div class="col-6">
                                    <form method="POST" action="{{ url('grupos',[$run] )}}">
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
<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmGrupos" method="POST" action="{{ url('grupos') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control select2" name="id_matricula" id="" required style="width: 85%;">
                            <option value="">Seleccione la matricula</option>
                            @foreach($matriculas as $row)
                            <option value="{{$row->id}}">{{$row->matricula}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control select2" name="id_asignatura" id="" required style="width: 85%;">
                            <option value="">Seleccione la asignatura</option>
                            @foreach($asignaturas as $row)
                            <option value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <select name="id_profesor" class="form-control select2" required style="width: 85%;">
                            <option value="">Seleccione el codigo del profesor</option>
                            @foreach($maestros as $row)
                            <option value="{{$row->id}}">{{$row->codigo}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control select2" name="id_carrera" id="" required style="width: 85%;">
                            <option value="">Seleccione la carrera</option>
                            @foreach($carreras as $row)
                            <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
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
        </div>
    </div>
</div>
<!-- Aqui termina la ventana modal -->
<!-- Aqui finaliza el contenido -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#pro2').DataTable();
    });
    // Empieza select 2
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection()