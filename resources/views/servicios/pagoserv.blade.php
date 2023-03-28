@extends('layouts.app')
@section('content')
<section class="section mt-3">

    <div class="card-body">
        <h2 class="title-2">Aspirantes</h2>
        <div class="row mt-3 mb-4">
            <div class="col-md-4 offset-md-4">
                <div class="d-grid mx-auto">
                    <br>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                        <i class="fa-solid fa-circle-plus"></i> Añadir
                    </button>
                </div>
            </div>
        </div>

        <div class="respon">
            <table id="pro4" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>
                        <th scope="col" class="text-center text-black">SERVICIO</th>
                        <th scope="col" class="text-center text-black">MATRICULA</th>
                        <th scope="col" class="text-center text-black">FECHA DE PAGO SERVICIO</th>
                        <th scope="col" class="text-center text-black">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($registro_pagos as $row)
                    <tr>
                        <td class="text-center  fw-bold text-black">{{ $row->nombre_serv }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->id_matricula}}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->estado }}</td>
                        <td class="text-center">

                            <div class="d-inline-block me-2">
                                <a href="{{ url('registrop', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></a>
                            </div>
                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('registrop', [$row]) }}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
    </div>

</section>

<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmServicios" method="POST" action="{{url("registrop")}}">
                    @csrf
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3 d-flex justify-content-center align-items-center">
                        <span class="input-group-text"><i class="fa-solid fa-wallet"></i></span>
                        <select name="id_servicio" class="select2 form-control " required style="width: 89%;">
                            <option class="select-wit " value="">SELECCIONA EL SERVICIO</option>
                            @foreach($servicios as $row)
                            <option value="{{$row->id}}">{{$row->nombre_serv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- FIN DE DATO -->
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="text" name="id_matricula" class="form-control" maxlength="50" placeholder="SELECIONA LA MATRICULA" required>
                    </div>
                    <!-- FIN DE DATO -->
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-check"></i></span>
                        <input type="date" name="estado" class="form-control" maxlength="50" placeholder="ESTATO DEL PAGO" required>
                    </div>
                    <!-- FIN DE DATO -->
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
                <!-- final del formulario -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#pro4').DataTable();
    });

    //  TERMINA DATATABLES

    // Empieza select 2
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>

@endsection()