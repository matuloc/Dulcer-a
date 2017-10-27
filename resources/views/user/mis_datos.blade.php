@extends('user.layout.cabecera')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Mi cuenta
      </h1>
    </section>
  <section class="content container-fluid">
  @include('flash::message')
    <div class="col-md-6">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Informacion Personal</h3>
          </div>
          {!! Form::open(['route'=>'user.actualizar','method'=>'POST']) !!}
            <div class="box-body">
              @foreach($misdatos as $user)
              <input type="hidden" class="id" name="id" value="{{ $user->id }}">
              <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label>Nombre</label>
                <input id="nombre" class="form-control" type="text" placeholder="Nombre"  name="nombre" value="{{ $user->nombre }}" required>
                @if ($errors->has('nombre'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                <label>Apellido</label>
                <input id="apellido" class="form-control" type="text" placeholder="Apellido"  name="apellido" value="{{ $user->apellido }}" required>
                @if ($errors->has('apellido'))
                  <span class="help-block">
                    <strong>{{ $errors->first('apellido') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                <label>Rut</label>
                <input id="rut" class="form-control" type="text" placeholder="rut" maxlength="8" name="rut" value="{{ $user->rut }}" required>
                @if ($errors->has('rut'))
                  <span class="help-block">
                    <strong>{{ $errors->first('rut') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
                <label>Dirección</label>
                <input id="direccion" class="form-control" type="text" minlength="4" name="direccion" value="{{ $user->direccion }}" required>
        				@if ($errors->has('direccion'))
        					<span class="help-block">
        						<strong>{{ $errors->first('direccion') }}</strong>
        					</span>
        				@endif
              </div>
              <div class="form-group {{ $errors->has('telefono') ? ' has-error' : '' }}">
                <label>Teléfono</label>
                <input id="telefono" class="form-control" type="text" minlength="9" maxlength="9" name="telefono" value="{{ $user->telefono }}" required>
        				@if ($errors->has('telefono'))
        					<span class="help-block">
        						<strong>{{ $errors->first('telefono') }}</strong>
        					</span>
        				@endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Correo</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ $user->email }}" required>
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              @endforeach
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-danger">Actualizar</button>
            </div>
          {!! Form::close() !!}
        </div>
    </div>
  </section>
</div>
@endsection
