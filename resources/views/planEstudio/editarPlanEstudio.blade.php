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
                        <!-- aqui al igual que en la vista en donde agregamos los datos esta es la de editar
                        en donde al principio tiene el method PUT el cual se va a encargar de que los datos 
                        que el usuario se actualicen en la base de datos  -->
                        @method('PUT')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            
                            
                                <select class="form-control" name="id_asignatura" id="" value="{{ $planEstudio->id_asignatura}}" required>
                            @foreach($asignaturas as $row)
                            @if ($row->id == $planEstudio->id_asignatura)
                            <option selected value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
                            @endif
                            @endforeach
                            </select>
                            <!-- aqui lo que vemos en el seelct es que tiene un if el cual lo que va a hacer
                                es que si el id del objeto que esta recorriendo en el foreach a la llave foranea 
                                es igual va a imprimir pero el nombre y no numeros cabe recalcar que pasa lo mismo
                                con los demas si es un campo como un input este solo se vera llenado con datos que son traidos 
                                de la base de datos  -->
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="nombre_plan" class="form-control" value="{{ $planEstudio->nombre_plan}}" maxlength="120" placeholder="Nombre del Plan de Estudio">
                            <!-- los name del input hace referencia para que se pueda almacenar en su lugar indicado en la base de datos
                                y todos y cada unos de estos se llenan con datos que se han creado ateriormente -->
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