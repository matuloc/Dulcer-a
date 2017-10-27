@extends('Administrador.layouts.cabecera')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Usuarios
    </h1>
  </section>

  <section class="content container-fluid">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Administradores</h3>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha Creacion</th>
              </tr>
              @foreach($admins as $admin)
              <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->created_at }}</td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Usuarios</h3>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rut</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Fecha Creación</th>
              </tr>
              @foreach($usuarios as $usuario)
              <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                <td>{{ $usuario->rut }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->created_at }}</td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
