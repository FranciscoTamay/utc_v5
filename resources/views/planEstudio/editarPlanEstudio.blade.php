@extends('layouts.app')
@section('content')
<div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    EDITAR PLAN DE ESTUDIO
                </div>

                <div class="card-body">
                    <form id="frmPlanEstudio" method="POST" action="{{ url('planEstudio',[$planEstudio] )}}">
                        @method('PUT')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <!-- <input type="number" name="id_asignatura" class="form-control" value="{{ $planEstudio->id_asignatura}}" maxlength="50" placeholder="Asignatura"> -->
                            <!-- lo que se tiene puesto en el value la variable $carrera es nuestro objeto y codigo carrera
                                es del valor de la columna que se tiene en la tabla teniendo en cuenta que nos referimos al 
                                name del imput -->
                                <select class="form-control" name="id_asignatura" id="" value="{{ $planEstudio->id_asignatura}}" required>
                            @foreach($asignaturas as $row)
                            @if ($row->id == $planEstudio->id_asignatura)
                            <option selected value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
                            @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="nombre_plan" class="form-control" value="{{ $planEstudio->nombre_plan}}" maxlength="120" placeholder="Nombre del Plan de Estudio">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="anio" class="form-control" value="{{ $planEstudio->anio}}" maxlength="50" placeholder="Año del Plan de Estudio" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="cuatrimestres" class="form-control" value="{{ $planEstudio->cuatrimestres}}" maxlength="50" placeholder="Cuatrimestres del Plan de Estudio" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="anio" class="form-control" value="{{ $planEstudio->anio}}" maxlength="50" placeholder="Año del Plan de Estudio" required>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="horas" class="form-control" value="{{ $planEstudio->horas}}" maxlength="50" placeholder="Año del Plan de Estudio" required>
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
                                <a href="/planEstudio"></a>
                            <i class="fa-solid fa-arrow-left"></i> Regresar
                            </button>
                        <!-- boton de regresar -->
                        
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