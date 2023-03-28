@extends('layouts.app')
@section('content')

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
                        <th scope="col" class="text-center text-black">NOMBRE PLAN</th>
                        <th scope="col" class="text-center text-black">AÑO</th>
                        <th scope="col" class="text-center text-black">CUATRIMESTRES</th>
                        <th scope="col" class="text-center text-black">HORAS</th>
                        <th scope="col" class="text-center text-black">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($planEstudios as $run)
                    <tr>
                        <td scope="col" class="text-center text-black fw-bold">{{$run->nombre_plan}}</td>
                        <td scope="col" class="text-center text-black fw-bold">{{$run->anio}}</td>
                        <td scope="col" class="text-center text-black fw-bold">{{$run->cuatrimestres}}</td>
                        <td scope="col" class="text-center text-black fw-bold">{{$run->horas}}</td>
                        <td>
                            <div class="d-inline-block me-2">
                                <a href="{{ url('planEstudio',[$run]) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <!-- boton de editar -->

                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('planEstudio',[$run] )}}">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un Plan de Estudios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmPlanEstudio" method="POST" action="{{ url('planEstudio') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="nombre_plan" class="form-control" maxlength="120" placeholder="Nombre del plan" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                        <i class="fa-solid fa-calendar-days"></i>
                        </span>
                        <input type="number" name="anio" class="form-control" maxlength="50" placeholder="Año del Plan de Estudio" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                        <i class="fa-solid fa-calendar-check"></i>
                        </span>
                        <input type="number" name="cuatrimestres" class="form-control" maxlength="50" placeholder="Cuatrimestres del Plan de Estudio" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                        <i class="fa-solid fa-arrow-down-9-1"></i>
                        </span>
                        <input type="number" name="horas" class="form-control" maxlength="50" placeholder="Horas del Plan de Estudio" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                    </div>

                    <div class="d-grid col-6 mx-auto">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@livewireScripts
@livewireStyles
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