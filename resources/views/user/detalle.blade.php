@extends('user.layout.cabecera')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
  <h1>
    Pedidos
  </h1>
</section>
    <section class="invoice">
      @include('flash::message')
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Confitería La Maestra
            <small class="pull-right">Emision del Pedido: {{ $informacion->orders_fecha_creada }}</small>
          </h2>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          DE
          <address>
            <strong>Jaime Sepulveda</strong><br>
            Telefono: 95871123446<br>
            Correo: jaime1969@live.cl
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          PARA
          <address>
            <strong>{{ $informacion->users_nombre }}</strong><br>
            {{ $informacion->users_direccion }}<br>
            Telefono: {{ $informacion->users_telefono }}<br>
            Email: {{ $informacion->users_email }}
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          @if( $informacion->orders_id_estado==1)
          <b>ESTADO: </b><span class="label label-primary">{{ $informacion->estado_descripcion }}</span><br>
            @elseif( $informacion->orders_id_estado ==2)
            <b>ESTADO: </b><span class="label label-warning">{{ $informacion->estado_descripcion }}</span><br>
              @elseif( $informacion->orders_id_estado ==3)
              <b>ESTADO: </b><span class="label label-success">{{ $informacion->estado_descripcion }}</span><br>
                @elseif( $informacion->orders_id_estado ==4)
                <b>ESTADO: </b><span class="label label-danger">{{ $informacion->estado_descripcion }}</span><br>
          @else
          @endif
          <b>Orden ID: {{ $informacion->order_id }}</b><br>
          <b>REF. Pago: {{ $informacion->orders_codigo }}</b><br>
          <b>Fecha Despacho: {{ $informacion->orders_fecha_entrega }}</b><br>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Producto</th>
              <th>Marca</th>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Precio Unit.</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              @foreach($pedidos as $pedido)
              <tr>
                <td>{{ $pedido->productos_id }}</td>
                <td>{{ $pedido->producto_nombre }}</td>
                <td>{{ $pedido->marca_nombre }}</td>
                <td>{{ $pedido->productos_descripcion }}</td>
                <td>{{ $pedido->detalle_cantidad }}</td>
                <td>{{ $pedido->producto_precio }}</td>
                <td>{{ $pedido->detalle_total }}</td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <p class="lead">Informacion</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            La distribuidora Jaime Sepulveda e Hijos Ltda. se basa en ofrecer al cliente un distribuidor eficiente de quesos y cecinas, con productos frescos, de excelente calidad y marcas reconocidas para abastecer la demanda de cualquier tipo de negocio que trabaje con este tipo de productos.
          </p>
        </div>
        <div class="col-xs-6">
          <div class="table-responsive">
            <div>&nbsp;</div>
            <table class="table" style="font-size: 23px;">
                <th>Total: {{ $informacion->orders_total }}</th>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
          @if( $informacion->orders_id_estado==2)
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-check"></i> Validar Pedido
          </button>
          @else
          @endif
          <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Ingrese numero de transaccion del deposito<br>o codigo que referencie el pago:</h4></center>
              </div>
              <div class="modal-body">
              {!! Form::open(['route'=>'user.validar_pedido','method'=>'POST']) !!}
                <div class="form-group">
                  <label>Codigo, ID o Numero de Transaccion:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-arrow-right"></i>
                    </div>
                    <input type="text" class="form-control" name="codigo" required>
                    <input type="hidden" class="idCompra" name="idCompra" value="{{ $informacion->order_id }}">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" >ENVIAR</button>
                </div>
              {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </section>
</div>
@endsection
