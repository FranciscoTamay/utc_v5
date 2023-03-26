@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->

<div class="section">
    <!-- FIN DEL CARD DEL SECTION (ES PARA QUE NO SE VEA TAN PEGADO AL HEADER ) -->
    <div class="row mt-1">
        <div class="col-md-4 offset-md-4 mt-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
    </div>
    <!-- aqui es en donde termina el boton para abrir el modal de carreras -->
    <div class="card-body">
        <h2 class="title-2">Aspirantes</h2>
        <div class="respon">
            <table id="pro2" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">CODIGO</th>
                        <th class="text-center">NOMBRE CARRERA</th>
                        <th class="text-center">PLAN ESTUDIO</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($carreras as $run)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$run->codigo_carrera}}</td>
                        <td>{{$run->nombre_carrera}}</td>
                        <td>{{$run->nombre_plan}}</td>
                        <td class="text-center">

                            <div class="d-inline-block me-2">
                                <a href="{{ url('carreras',[$run]) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <!-- boton de editar -->

                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('carreras',[$run] )}}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCarreras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar una carrera</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmCarreras" method="POST" action="{{ url('carreras') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="codigo_carrera" class="form-control" maxlength="50" placeholder="Codigo de la Carrera" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="nombre_carrera" class="form-control" maxlength="120" placeholder="Nombre de la Carrera" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control" name="id_plan" id="">
                            <option value="">Plan de Estudios</option>
                            @foreach($planEstudios as $row)
                            <option value="{{$row->id}}">{{$row->nombre_plan}}</option>
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
@section('scripts')
<script>
    $(document).ready(function() {
        $('#pro2').DataTable();
    });

    //  TERMINA DATATABLES

    // Empieza select 2
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>
@endsection()