@extends('layouts.Cabecera-secundaria')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
	<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-desktop" aria-hidden="true"></i> Pedidos Online 24/7</li>
			</ul>
		</div>
		<div class="w3ls_logo_products_left">
			<h1>Carro de Compras</h1>
		</div>
		<div class="clearfix"> </div>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<!-- INICIO -->
          <tbody>
						<?php
						$total=0;
					?>
          @foreach($cartItems as $producto)
					<tr class="rem">
						<?php $imagen=DB::table('productos')->select('imagen')->where('id','=',$producto->id)->first();?>
						<td class="invert-image"><a><img style="width: 72px; height: 72px;" src="/images/productos/<?php echo $imagen->imagen;?>" class="img-responsive" /></a></td>
						<td class="invert">{{ $producto->name }}</td>
						<td class="invert">
							 <div class="quantity">
								<div class="quantity-select">
									{!! Form::open(['route'=>['Carro.update',$producto->rowId],'method'=>'PUT']) !!}
											{{ csrf_field() }}
											<input name="id" type="hidden" value="{{ $producto->id }}">
										<input type="number" min="1" max="2000" maxlength="4" name="qty" style="width:50px;" value="{{ $producto->qty }}">
										<input style="padding-bottom:10px;" type="submit" class="btn btn-sm btn-success" value="Añadir">
	                {!! Form::close() !!}
								</div>
							</div>
						</td>
						<td class="subtotal">{{ $producto->price }}</td>
						<td class="invert">
              <form action="{{ route('Carro.destroy',$producto->rowId) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input class="btn btn-md btn-danger" type="submit" value="Eliminar Producto">
                </form>
						</td>
					</tr>
					<?php
								$total=($producto->price* $producto->qty )+$total;
							?>
          @endforeach
        </tbody>
        @if(Cart::count()>0)
          <h2>Su carro contiene <span>{{ Cart::count() }} Productos</span></h2>
					@if(Auth::guest())
					<center><h2>Necesita registrarse para comprar!</h2></center>
					@else
					@endif
        @else
          <center><h2>Su carro de compras esta vacio</h2></center>
        @endif
					<!--FIN -->
				</table>
			</div>
			<div class="checkout-left">
				<div class="checkout-left-basket">
					<h4 id="total"><?php echo 'Total: $'.$total;?></h4>
				</div>
      @if (Cart::count()>0)
				@if(Auth::guest())
				@else
				<div class="checkout-right-compra">
					<a href="{{ route('carro.comprar') }}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>REALIZAR PEDIDO</a>
				</div>
				<div class="clearfix"> </div>
				@endif
      @else
      @endif
			</div>
			<div class="checkout-left">
				<div class="checkout-right-basket">
					<a href="{{ route('productos.index') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continua comprando</a>
				</div>
			</div>
		</div>
	</div>
@endsection
