<div>
   <section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4"></div> 
                                    <!-- esta madre nada mas es una espacio en blanco para centrar col-md- y el perro tamaño que quieras jsjsjjs -->
                                    <div class="col-md-4 col-sm-1">
                                    <div class="accordion" id="accordionExample">
                                             <!-- ALERTA DE AGREGADO CON EXITO -->
@if(Session::has('success'))

<div class="alert alert-success text-center"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 {{Session::get('success')}}
</div>

@endif
<!-- FIN DE ALERTA DE AGREGADO CON EXITO -->

  <!-- ALERTA DE EDITAR CON EXITO -->
@if(Session::has('warning'))

<div class="alert alert-warning text-center"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 {{Session::get('warning')}}
</div>
@endif
 <!-- FIN ALERTA DE EDITAR CON EXITO -->

   <!-- ALERTA DE BORRAR CON EXITO -->
@if(Session::has('danger'))

<div class="alert alert-danger text-center"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 {{Session::get('danger')}}
</div>
@endif
 <!-- FIN ALERTA DE BORRAR CON EXITO -->


                             <!-- AGREGAR SERVICIO -->
<div class="row"></div>                  
 <div class="accordion-item ">
    <h2 class="accordion-header bg-success" id="headingTwo">

      <button class="accordion-button text-center " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne"><i class="fa-solid fa-wallet"></i>
                    AGREGAR UN SERVICIO
      </button>
      
    </h2>

    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body ">
       <!-- FORMULARIO PARA AGREGAR -->
       <div class="modal-body">
    <form id="frmServicios" method="POST" action="{{url("servicios")}}">
    @csrf
    <!-- CASILLA DE DATO -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" wire:model="codigo_serv" name="codigo_serv" class="form-control @error('codigo_serv') is-invalid @enderror" maxlength="50" placeholder="CODIGO SERVICIO">
        @error('codigo_serv')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
        <input wire:model="nombre_serv" type="text" name="nombre_serv" class="form-control @error('nombre_serv') is-invalid @enderror" maxlength="50" placeholder="NOMBRE SERVICIO" required>
        @error('nombre_serv')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
    </div>
    <!-- FIN DE DATO -->
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
        <input type="number" wire:model="precio_serv" name="precio_serv" class="form-control @error('precio_serv') is-invalid @enderror" maxlength="50" placeholder="PRECIO DE SERVICIO" required>
        @error('precio_serv')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
    </div>
    <!-- FIN DE DATO -->
 
   
<div class="d-grid col-6 mx-auto">
    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
</div>
    </form>

</div>

        <!-- FIN FORMULARIO PARA AGREGARR-->

      </div>
    </div>
  </div>
</div>
                                    
                               
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>

</section>
 
</div>
