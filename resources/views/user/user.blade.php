@extends('user.layout.cabecera')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Mis Pedidos
    </h1>
  </section>
  <section class="content container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Detalle de Pedidos</h3>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Informacion</th>
              </tr>
              @foreach($pedidos as $pedido)
              <tr>
                <td>{{ $pedido->id }}</td>
                @if( $pedido->id_estado ==1)
                <td><span class="label label-primary">{{ $pedido->descripcion }}</span></td>
                @elseif( $pedido->id_estado ==2)
                <td><span class="label label-warning">{{ $pedido->descripcion }}</span></td>
                @elseif( $pedido->id_estado ==3)
                <td><span class="label label-success">{{ $pedido->descripcion }}</span></td>
                @elseif( $pedido->id_estado ==4)
                <td><span class="label label-danger">{{ $pedido->descripcion }}</span></td>
                @else
                @endif
                <td>{{ $pedido->created_at }}</td>
                <td>{{ $pedido->nombre }} {{ $pedido->apellido }}</td>
                <td>{{ $pedido->direccion }}</td>
                <td><a href="{{ route('user.detalle', ['id'=> $pedido->id]) }}">VER DETALLE</a></td>
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
