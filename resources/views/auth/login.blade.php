@extends('layouts.auth_app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<link rel="stylesheet" href="css/login1.css">
@section('title')
Admin Login
@endsection
@section('content')
<div class="container">
    <div class="box">
        <div class="content">
            <div class="form">
                <h3 class="logo"><img src='img/utc.png'></h3>
                <h2>UTC</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="inputBox">
                        <input type="text" aria-describedby="emailHelpBlock" id="email" class="form-control1{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" tabindex="1" value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus required>
                        <i class="fa-solid fa-user"></i>
                        <span>Correo</span>
                    </div>
                    <div class="inputBox">
                        <input aria-describedby="passwordHelpBlock" id="password" type="password" value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}" class="form-control1{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2" required>
                        {{ $errors->first('password') }}
                        <i class="fa-solid fa-lock"></i>
                        <span>Contraseña</span>
                    </div>
                    <div class="inputBox " tabindex="4">
                        <input type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger p-0">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label for="email">Email</label>
            <input aria-describedby="emailHelpBlock" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter Email" tabindex="1" value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus required>
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">Password</label>
                <div class="float-right">
                    <a href="{{ route('password.request') }}" class="text-small">
                        Forgot Password?
                    </a>
                </div>
            </div>
            <input aria-describedby="passwordHelpBlock" id="password" type="password" value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}" placeholder="Enter Password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2" required>
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">Remember Me</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
            </button>
        </div>
    </form>
</div> -->
@endsection