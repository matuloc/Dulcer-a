@extends('layouts.Cabecera-secundaria')

@section('content')
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Inicio de Sesión</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Correo:</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Contraseña:</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Ingresar
                    </button>
                </div>
            </div>
        </form>
			</div>
			<h4>¿Eres nuevo en la página?</h4>
			<p><a href="{{ url('/register') }}">Regístrate Aquí</a>(o) vuelve al menú de<a href="{{ route('principal') }}">Inicio<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
@endsection
