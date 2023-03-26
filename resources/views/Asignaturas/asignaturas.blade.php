@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->

<div class="section">

    <div class="row mt-1">
        <div class="col-md-4 offset-md-4 mt-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <h2 class="title-2">Aspirantes</h2>
        <div class="respon">
            <table id="pro3" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>
                        <th>ID</th>
                        <th>CODIGO</th>
                        <th>NOMBRE ASIGNATURA</th>
                        <th>NUMERO DE UNIDADES</th>
                        <th>HORAS</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($asignaturas as $run)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$run->codigo_asignatura}}</td>
                        <td>{{$run->nombre_asignatura}}</td>
                        <td>{{$run->num_unidades}}</td>
                        <td>{{$run->horas}}</td>
                        <td>

                            <div class="d-inline-block me-2">
                                <a href="{{ url('asignaturas',[$run]) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <!-- boton de editar -->

                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('asignaturas',[$run] )}}">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar una Asignatura</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmAsignaturas" method="POST" action="{{ url('asignaturas') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="codigo_asignatura" class="form-control" maxlength="50" placeholder="Codigo de la Asignatura" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="nombre_asignatura" class="form-control" maxlength="120" placeholder="Nombre de la Asignatura" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="num_unidades" class="form-control" maxlength="50" placeholder="Número de Unidades" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="horas" class="form-control" maxlength="50" placeholder="Ingrese las horas de la asignatura" required>
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
        $('#pro3').DataTable();
    });

    //  TERMINA DATATABLES

    // Empieza select 2
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>
@endsection()