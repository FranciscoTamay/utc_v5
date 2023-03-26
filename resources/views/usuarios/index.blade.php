@extends('layouts.app')

@section('content')
<section class="section mt-4">
  <div class="card-body">
    <h2 class="title-2">Usuarios</h2>

    <div class="row mt-1 mt-4 mb-4">
      <div class="col-md-4 offset-md-4">
        <div class="d-grid mx-auto">
          <a href="{{ route('usuarios.create') }}" class="btn btn-dark">
            <i class="fa-solid fa-circle-plus"></i> Nuevo
          </a>
        </div>
      </div>
    </div>

    <div class="respon">
      <table id="pro" class="xd display responsive nowrap" style="width:95%">
        <thead class="bg-darck text-center">
          <th  class="text-center text-wiela">Nombre</th>
          <th class="text-center text-black">E-mail</th>
          <th  class="text-center text-black">Rol</th>
          <th  class="text-center text-black">Acciones</th>
        </thead>
        <tbody>
          @foreach ($usuarios as $usuario)
          <tr>
            <td class="text-center  fw-bold text-black">{{ $usuario->name }}</td>

            <td class="text-center  fw-bold text-black">{{ $usuario->email }}</td>
            <td class="text-center  fw-bold text-black">
              @if(!empty($usuario->getRoleNames()))
              @foreach($usuario->getRoleNames() as $rolNombre)
              <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
              @endforeach
              @endif
            </td>

            <td>
              <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

              {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#pro').DataTable();
  });
</script>
@endsection()