@extends('layouts.app')
@section('content')

    <div class="modal" tabindex="-1" role="dialog" wire:ignore.self wire:modal>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" >Agregar un grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form>
                <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" wire:model="codigo_asignatura" id="codigo_asignatura" class="form-control @error('codigo_asignatura') is-invalid @enderror" maxlength="50" placeholder="CODIGO DE ASIGNATURA">
        @error('codigo_asignatura')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" wire:model="nombre_asignatura" id="nombre_asignatura" class="form-control @error('nombre_asignatura') is-invalid @enderror" maxlength="50" placeholder="NOMBRE ASIGNATURA">
        @error('nombre_asignatura')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
    </div>
            
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" wire:model="num_unidades" id="num_unidades" class="form-control @error('num_unidades') is-invalid @enderror" maxlength="50" placeholder="NUMERO DE UNIDADES">
        @error('num_unidades')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" wire:model="horas" id="horas" class="form-control @error('horas') is-invalid @enderror" maxlength="50" placeholder="HORAS DE LA ASIGNATURA">
        @error('horas')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
    </div>

    
                </form>
                <!-- final del formulario -->

                <div class="d-grid col-6 mx-auto">
    <button wire:click.prevent='guardar()' class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
</div>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent='CerrarModal()'  class="btn btn-secondary" >Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Aqui termina la ventana modal -->
<!-- Aqui finaliza el contenido -->
@endsection