<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') UTC</title>
    @livewireStyles
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="/all-css/bootstrap.css">
    
    <!-- Ionicons -->
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- fin -->
<!-- EXPORTAR EXEL -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">

<!-- fin -->
<!-- SELECT 2 -->
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css"> 
<!-- fin -->
<!-- RESPONSIVE DATATABLES -->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">	
<link href="all-css/jquery.min.css" rel="stylesheet">
<!-- fin -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('all-css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('all-css/iziToast.min.css') }}">
    <link href="{{ asset('all-css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://kit.fontawesome.com/270e7df619.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/all-css/all.min.css">
    <link rel="icon" type="image/png" href="img/utc.png">
<!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('all-css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('all-css/components.css')}}">
    @yield('css')
</head>
<body>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('layouts.header')

        </nav>
        <div class="main-sidebar main-sidebar-postion">
            @include('layouts.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

    </div>
</div>

<div id="miModal" class="modal3">
  <div class="modal-contenido3">
    <span class="cerrar3" onclick="cerrarModal()">&times;</span>
    <iframe id="miIframe" width="100%" height="100%"></iframe>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- DATATABLES RESPONSIVE -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"></script>
    <!-- FIN DATATABLES RESPONSIVE -->
<script src="{{ asset('all-js/popper.min.js') }}"></script>
<script src="{{ asset('all-js/bootstrap.min.js') }}"></script>
<script src="{{ asset('all-js/sweetalert.min.js') }}"></script>
<script src="{{ asset('all-js/iziToast.min.js') }}"></script>
<script src="{{ asset('all-js/jquery.nicescroll.js') }}"></script>
<script src="all-js/all.min.js"></script>
<script src="https://kit.fontawesome.com/270e7df619.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
            <!-- Para usar los botones -->
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
            <!-- Para los estilos en Excel -->
            <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>  
<!-- Template JS File -->
<script src="{{ asset('all-js/stisla.js') }}"></script>
<script src="{{ asset('all-js/scripts.js') }}"></script>
<script src="{{ asset('all-js/profile.js') }}"></script>
<script src="{{ asset('all-js/custom.js') }}"></script>
@livewireScripts
@yield('scripts')
<script>
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = "{{ route('login') }}";
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));

    function abrirModal() {
  var modal = document.getElementById("miModal");
  var iframe = document.getElementById("miIframe");
  iframe.src = "Manual_de_Usuarioo.pdf";
  modal.style.display = "block";
}

function cerrarModal() {
  var modal = document.getElementById("miModal");
  modal.style.display = "none";
  var iframe = document.getElementById("miIframe");
  iframe.src = "";
}
// Obtener la ventana modal
var modal = document.getElementById("miModal");

// Obtener la ubicación del cursor en el momento en que se hace clic
var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
modal.onmousedown = dragMouseDown;

function dragMouseDown(e) {
  e = e || window.event;
  e.preventDefault();
  // Obtener la posición del cursor en el momento en que se hace clic
  pos3 = e.clientX;
  pos4 = e.clientY;
  document.onmouseup = closeDragElement;
  // Llamar a la función para mover la ventana modal cada vez que el cursor se mueve
  document.onmousemove = elementDrag;
}

function elementDrag(e) {
  e = e || window.event;
  e.preventDefault();
  // Calcular la nueva posición de la ventana modal
  pos1 = pos3 - e.clientX;
  pos2 = pos4 - e.clientY;
  pos3 = e.clientX;
  pos4 = e.clientY;
  // Establecer la nueva posición de la ventana modal
  modal.style.top = (modal.offsetTop - pos2) + "px";
  modal.style.left = (modal.offsetLeft - pos1) + "px";
}

function closeDragElement() {
  // Detener el movimiento de la ventana modal cuando el usuario suelta el clic
  document.onmouseup = null;
  document.onmousemove = null;
}


</script>
<!-- MOMENT JS -->
<script src="{{ asset('all-js/moment.js') }}"></script>
<script src="{{ asset('all-js/moment-with-locales.js') }}"></script>
</html>
