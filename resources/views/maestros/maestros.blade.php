@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->
<section class="section mt-4">


    <div class="card-body">
        <h2 class="title-2">Maestros</h2>
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
                <thead class="bg-secondary text-center">
                    <tr>
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
                    @foreach($maestros as $row)
                    <tr>
                        <td>{{ $row->codigo }}</td>
                        <td>{{$row->sexo}}</td>
                        <td>{{$row->apellido_paterno}}</td>
                        <td>{{$row->apellido_materno}}</td>
                        <td>{{$row->nombres}}</td>
                        <td>{{$row->curp}}</td>
                        <td>{{$row->num_seguro}}</td>
                        <td>{{$row->rfc}}</td>
                        <td>{{$row->grado_nombre}}</td>

                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ url('maestros',[$row]) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                <!-- boton de editar -->

                                <div class="col-6">
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

<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmMaestros" method="POST" action="{{ url('maestros') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="codigo" class="form-control" maxlength="50" placeholder="Código del Profesor" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
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
                        <input type="text" name="apellido_paterno" class="form-control" maxlength="120" placeholder="Apellido Paterno" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '')" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="apellido_materno" class="form-control" maxlength="120" placeholder="Apellido Materno" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '')" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text"  name="nombres" class="form-control" maxlength="120" placeholder="Nombres" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '')" required>
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="curp" class="form-control" maxlength="120" placeholder="CURP" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ0-9\s]/g, '')" required>
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="num_seguro" class="form-control" maxlength="120" placeholder="NSS" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="rfc" class="form-control" maxlength="120" placeholder="RFC" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ0-9\s]/g, '')" required>
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control" name="id_grado" id="">
                            <option value="">Seleccione el grado Academico del profesor</option>
                            @foreach($grados as $row)
                            <option value="{{$row->id}}">{{$row->grado_nombre}}</option>
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
<!-- Aqui es en donde termina la tabla de las carreras -->
<!-- Aqui empieza la ventana modal  -->

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#pro4').DataTable();
    });
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>
@endsection()