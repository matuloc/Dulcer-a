@extends('layouts.Cabecera-secundaria')

@section('content')
<div class="container">
  <div class="register">
  <div class="container">
    <h2>Que bueno que estas aqui<br>registrate abajo</h2>
    <center>
      <a>REGISTRO DE 20 SEGUNDOS!</a>
    </center>
    <div class="login-form-grids">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}
        <center><h5>Información del registro</h5></center>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" placeholder="Correo" name="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" placeholder="Contraseña" type="password" name="password">
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <input id="password-confirm" placeholder="Repetir Contraseña" type="password" name="password_confirmation">
          @if ($errors->has('password_confirmation'))
            <span class="help-block">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
          @endif
        </div>
        <br>
        <center><h5>Información Perfil</h5></center>
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
          <input id="nombre" type="text" placeholder="Nombre"  name="nombre" value="{{ old('nombre') }}">
          @if ($errors->has('nombre'))
            <span class="help-block">
              <strong>{{ $errors->first('nombre') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
          <input id="apellido" type="text" placeholder="Apellido"  name="apellido" value="{{ old('apellido') }}">
          @if ($errors->has('apellido'))
            <span class="help-block">
              <strong>{{ $errors->first('apellido') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
          <input id="rut" type="text" placeholder="rut" maxlength="8" name="rut" value="{{ old('rut') }}">
          @if ($errors->has('rut'))
            <span class="help-block">
              <strong>{{ $errors->first('rut') }}</strong>
            </span>
          @endif
        </div>
        <br>
        <center><h5>Informacion de Envío</h5></center>
        <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
          <input id="direccion" type="text" minlength="4" placeholder="Dirección" name="direccion" required>
  				@if ($errors->has('direccion'))
  					<span class="help-block">
  						<strong>{{ $errors->first('direccion') }}</strong>
  					</span>
  				@endif
        </div>
        <div class="form-group {{ $errors->has('telefono') ? ' has-error' : '' }}">
          <input id="telefono" type="text" minlength="9" maxlength="9" placeholder="Teléfono" name="telefono">
  				@if ($errors->has('telefono'))
  					<span class="help-block">
  						<strong>{{ $errors->first('telefono') }}</strong>
  					</span>
  				@endif
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-user"></i> Registrar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
