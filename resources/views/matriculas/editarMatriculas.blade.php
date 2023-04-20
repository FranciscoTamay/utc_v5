@extends('layouts.app')
@section('content')
<div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    EDITAR CARRERA
                </div>

                <div class="card-body">
                    <form id="frmCarrera" method="POST" action="{{ url('matriculas',[$matricula] )}}">
                        @method('PUT')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="matricula" class="form-control" value="{{ $matricula->matricula}}" maxlength="50" placeholder="Código de la carrera" required>
                            <!-- lo que se tiene puesto en el value la variable $carrera es nuestro objeto y codigo carrera
                                es del valor de la columna que se tiene en la tabla teniendo en cuenta que nos referimos al 
                                name del imput -->
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            
                            <select class="form-control" name="id_plan" id="" value="{{ $matricula->id_alumno}}" required>
                            @foreach($alumnos as $row)
                            @if ($row->id == $matricula->id_alumnos)
                            <option selected value="{{$row->id}}">{{$row->curp}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->curp}}</option>
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
                            
                            <select class="form-control" name="id_grupo" id="" value="{{ $matricula->id_grupo}}" required>
                            @foreach($grupos as $row)
                            @if ($row->id == $matricula->id_grupo)
                            <option selected value="{{$row->id}}">{{$row->nombre_grupo}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre_grupo}}</option>
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
                                <a href="/matriculas"></a>
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