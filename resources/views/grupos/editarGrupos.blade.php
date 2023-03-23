@extends('layouts.app')
@section('content')
<div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    EDITAR GRUPOS
                </div>

                <div class="card-body">
                    <form id="frmGrupo" method="POST" action="{{ url('grupos',[$grupo] )}}">
                        @method('PUT')
                        @csrf
                       
 
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <select class="form-control" name="id_matricula" id="" value="{{ $grupo->matricula}}" required>
                            @foreach($matriculas as $row)
                            @if ($row->id == $grupo->id_matricula)
                            <option selected value="{{$row->id}}">{{$row->matricula}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->matricula}}</option>
                            @endif
                            @endforeach
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <select class="form-control" name="id_carrera" id="" value="{{ $grupo->codigo_asignatura}}" required>
                            @foreach($asignaturas as $row)
                            @if ($row->id == $grupo->id_asignatura)
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
                            <input type="number" name="num_unidades" class="form-control" value="{{ $grupo->id_profesor}}" maxlength="50" placeholder="Número de las unidades" required>
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <select class="form-control" name="id_profesor" id="" value="{{ $grupo->profesor}}" required>
                            @foreach($carreras as $row)
                            @if ($row->id == $grupo->id_carrera)
                            <option selected value="{{$row->id}}">{{$row->carrera}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->carrera}}</option>
                            @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <input type="number" name="horas" class="form-control" value="{{ $grupo->id_carrera}}" maxlength="50" placeholder="Número de las unidades" required>
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
                                <a href="/grupos"></a>
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