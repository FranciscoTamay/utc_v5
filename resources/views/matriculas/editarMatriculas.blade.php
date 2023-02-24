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
                            <input type="text" name="id_alumno" class="form-control" value="{{ $matricula->id_alumno}}" maxlength="120" placeholder="Nombre de la carrera" required>
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