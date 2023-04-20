@extends('layouts.app')
@section('content')
<div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    EDITAR ASIGNATURA
                </div>

                <div class="card-body">
                    <form id="frmCarrera" method="POST" action="{{ url('asignaturas',[$asignatura] )}}">
                        <!-- aqui al igual que en la vista en donde agregamos los datos esta es la de editar
                        en donde al principio tiene el method PUT el cual se va a encargar de que los datos 
                        que el usuario se actualicen en la base de datos  -->
                        @method('PUT')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="codigo_asignatura" class="form-control" value="{{ $asignatura->codigo_asignatura}}" maxlength="50" placeholder="Código de la asignatura" required>
                            <!-- los name del input hace referencia para que se pueda almacenar en su lugar indicado en la base de datos
                                y todos y cada unos de estos se llenan con datos que se han creado ateriormente -->
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="nombre_asignatura" class="form-control" value="{{ $asignatura->nombre_asignatura}}" maxlength="120" placeholder="Nombre de la asignatura" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="num_unidades" class="form-control" value="{{ $asignatura->num_unidades}}" maxlength="50" placeholder="Número de las unidades" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="horas" class="form-control" value="{{ $asignatura->horas}}" maxlength="50" placeholder="Número de las unidades" required>
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
                                <a href="/asignaturas"></a>
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