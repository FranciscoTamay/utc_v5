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
                    <form id="frmAlumno" method="POST" action="{{ url('alumnos',[$alumno] )}}">
                        @method('PUT')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="curp" class="form-control" value="{{ $alumno->curp}}" maxlength="50" placeholder="CURP del Alumno" required>
                            <!-- lo que se tiene puesto en el value la variable $carrera es nuestro objeto y codigo carrera
                                es del valor de la columna que se tiene en la tabla teniendo en cuenta que nos referimos al 
                                name del imput -->
                        </div>

            
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="num_seguro" class="form-control" value="{{ $alumno->num_seguro}}" maxlength="120" placeholder="NSS del alumno" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="apellido_paterno" class="form-control" value="{{ $alumno->apellido_paterno}}" maxlength="120" placeholder="Apellido Paterno del Alumno" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="apellido_materno" class="form-control" value="{{ $alumno->apellido_materno}}" maxlength="120" placeholder="Apellido Paterno del Alumno" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="text" name="nombres" class="form-control" value="{{ $alumno->nombres}}" maxlength="120" placeholder="Nombres del Alumno" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <!-- <input type="text" name="sexo" class="form-control" maxlength="120" placeholder="Nombres del Alumno" required> -->
                            <select name="sexo" id="" class="form-control" value="{{ $alumno->sexo}}" required>
                            <option value="">Seleccione su sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="number" name="telefono" class="form-control" value="{{ $alumno->telefono}}" maxlength="120" placeholder="Número del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="email" name="correo" class="form-control"value="{{ $alumno->correo}}" maxlength="120" placeholder="Correo del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="direccion" class="form-control" value="{{ $alumno->direccion}}" maxlength="120" placeholder="Direccion del Alumno" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="localidad" class="form-control" value="{{ $alumno->localidad}}" maxlength="120" placeholder="Localidad del Alumno" required>
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text">
            <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <input type="text" name="municipio" class="form-control" value="{{ $alumno->municipio}}" maxlength="120" placeholder="Municipio del Alumno" required>
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
                                <a href="/alumnos"></a>
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