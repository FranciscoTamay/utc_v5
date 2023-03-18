@extends('layouts.app')
@section('content')
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
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                EDITAR CARRERA
            </div>

            <div class="card-body">
                <form id="frmCarrera" method="POST" action="{{ url('maestros',[$maestro] )}}">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="codigo_carrera" class="form-control" value="{{ $maestro->codigo}}" maxlength="50" placeholder="Código de la carrera" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="sexo" class="form-control" value="{{ $maestro->sexo}}" maxlength="120" placeholder="Nombre de la carrera" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="apellido_paterno" class="form-control" value="{{ $maestro->apellido_paterno}}" maxlength="120" placeholder="Nombre de la carrera" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="apellido_materno" class="form-control" value="{{ $maestro->apellido_materno}}" maxlength="120" placeholder="Nombre de la carrera" required>
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="nombres" class="form-control" value="{{ $maestro->nombres}}" maxlength="120" placeholder="Nombre de la carrera" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="curp" max="18" class="form-control" value="{{ $maestro->curp}}" maxlength="120" placeholder="Nombre de la carrera" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="num_seguro" class="form-control" value="{{ $maestro->num_seguro}}" maxlength="120" placeholder="NSS" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="rfc" class="form-control" value="{{ $maestro->rfc}}" maxlength="120" placeholder="Nombre de la carrera" required>
                    </div>




                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control" name="id_grado" id="" value="" required>
                            <option value="{{$maestro->grado_nombre}}">{{$maestro->grado_nombre}}</option>
                            @foreach($grados as $row)
                            <option value="{{$row->id}}">{{$row->grado_nombre}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="row">
                        <div class="d-gid col-3 mx-auto">
                            <button class="btn btn-outline-success ">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar
                            </button>
                            <!-- boton de guardar -->
                        </div>

                        <div class="d-grid col-3 mx-auto">
                            <button class="btn btn-outline-info ">
                                <a href="/carreras"></a>
                                <i class="fa-solid fa-arrow-left"></i> Regresar
                            </button>
                            <!-- boton de guardar -->

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
@endsection()