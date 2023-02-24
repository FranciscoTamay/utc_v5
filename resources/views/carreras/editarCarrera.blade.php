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
                    <form id="frmCarrera" method="POST" action="{{ url('carreras',[$carrera] )}}">
                        @method('PUT')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="codigo_carrera" class="form-control" value="{{ $carrera->codigo_carrera}}" maxlength="50" placeholder="Código de la carrera" required>
                            <!-- lo que se tiene puesto en el value la variable $carrera es nuestro objeto y codigo carrera
                                es del valor de la columna que se tiene en la tabla teniendo en cuenta que nos referimos al 
                                name del imput -->
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="nombre_carrera" class="form-control" value="{{ $carrera->nombre_carrera}}" maxlength="120" placeholder="Nombre de la carrera" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <!-- <input type="number" name="id_plan" class="form-control" value="{{ $carrera->id_plan}}" maxlength="50" placeholder="Plan de estudio" required> -->
                            <select class="form-control" name="id_plan" id="" value="{{ $carrera->id_plan}}" required>
                            @foreach($planEstudios as $row)
                            @if ($row->id == $carrera->id_plan)
                            <option selected value="{{$row->id}}">{{$row->nombre_plan}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre_plan}}</option>
                            @endif
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