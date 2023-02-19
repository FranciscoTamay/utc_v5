@extends('layouts.app')
@section('content')
<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">  
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div style="background-color:#9b9b00" class="card-header text-white"> EDITAR PAGOS</div>
        <div class="card-body">
        <form id="frmServicios" method="POST" action="{{url("registrop",[$registro_pago])}}">
        @csrf
    @method('PUT')
    <!-- CASILLA DE DATO -->
    <div class="input-group mb-3">
        <span class="input-group"><i class="fa-solid fa-graduation-cap"></i></span>
        <select  name="id_servicio"  class="servicio1 form-control" required>
            <option value="">SELECCIONA EL SERVICIO</option>
             @foreach($servicios as $row)
                @if ($row->id == $registro_pago->id_servicio)
                         <option selected value="{{$row->id}}">{{$row->nombre_serv}}</option>
                @else
                         <option value="{{$row->id}}">{{$row->nombre_serv}}</option>
                @endif
                @endforeach

        </select>
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
        <input type="text" name="id_matricula" value="{{ $registro_pago->id_matricula }}" class="form-control" maxlength="50" placeholder="SELECIONA LA MATRICULA" required>
        
    </div>
    <!-- FIN DE DATO -->
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-calendar-check"></i></span>
        <input type="date" name="estado"  value="{{ $registro_pago->estado }}"class="form-control" maxlength="50" placeholder="ESTATO DEL PAGO" required>
        
    </div>
    <!-- FIN DE DATO -->
    <div class="d-grid col-6 mx-auto">
    <button  class="btn btn-outline-warning"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
</div>
<br>
      <!-- boton de REGRESAR -->
<div class="d-grid col-3 mx-auto">
                            <button class="btn btn-outline-info ">
                                <a href="/registrop"></a>
                            <i class="fa-solid fa-arrow-left"></i> Regresar
                            </button>
                  
                        
                        </div>
        </div>

    </div>

</div>
</div>
        </div>

    </div>

</div>




@endsection
@section('page_js')
        


            <script>
                $(document).ready(function() {
    $('.servicio1').select2();
});
            </script>
            @endsection()