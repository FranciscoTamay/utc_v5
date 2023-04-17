<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="https://utcentro.edu.mx" target="_blank">
            <img class="navbar-brand-full app-header-logo" src="{{ asset('img/utc.png') }}" width="50" >
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/utc.png') }}" width="45px" alt="" />
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>