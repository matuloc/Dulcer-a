@extends('Administrador.layouts.cabecera')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Panel de Control
    </h1>
  </section>
  <section class="content container-fluid">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $pedidos_mensual }}</h3>
            @if($mes_actual==1)
            <p>Pedidos Realizados en Enero</p>
            @elseif($mes_actual==2)
            <p>Pedidos Realizados en Febrero</p>
            @elseif($mes_actual==3)
            <p>Pedidos Realizados en Marzo</p>
            @elseif($mes_actual==4)
            <p>Pedidos Realizados en Abril</p>
            @elseif($mes_actual==5)
            <p>Pedidos Realizados en Mayo</p>
            @elseif($mes_actual==6)
            <p>Pedidos Realizados en Junio</p>
            @elseif($mes_actual==7)
            <p>Pedidos Realizados en Julio</p>
            @elseif($mes_actual==8)
            <p>Pedidos Realizados en Agosto</p>
            @elseif($mes_actual==9)
            <p>Pedidos Realizados en Septiembre</p>
            @elseif($mes_actual==10)
            <p>Pedidos Realizados en Octubre</p>
            @elseif($mes_actual==11)
            <p>Pedidos Realizados en Noviembre</p>
            @elseif($mes_actual==12)
            <p>Pedidos Realizados en Diciembre</p>
            @else
            @endif
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$porcentaje}}<sup style="font-size: 20px">%</sup></h3>
            <p>Pedidos Completados en mes actual</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $usuarios }}</h3>
            <p>Usuarios Registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $productos }}</h3>
            <p>Cantidad de Productos Trabajados</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Administracion de Pedidos</h3>
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
                <td><a href="{{ route('admin.pedidos', ['id'=> $pedido->id]) }}">VER DETALLE</a></td>
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
