<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('La Casa de Senet')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">

    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-success text-center">
            <h4 class="card-title"><strong>{{ __('INICIAR SESIÓN') }}</strong></h4>

          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('Ingresa tus credenciales ') }}</p>

            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">fingerprint</i>
                  </span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="{{ __('Nombre de Usuario o Correo Electrónico') }}" value="{{ old('username', null) }}" required autocomplete="username" autofocus>
              </div>
              @if ($errors->has('username'))
                <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                  <strong>{{ $errors->first('username') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña') }}" required autocomplete="current-password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuérdame') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-success btn-link btn-lg boton1">{{ __('INICIAR SESIÓN') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
</body>
</html>
