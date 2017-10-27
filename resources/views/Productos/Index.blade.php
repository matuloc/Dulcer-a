@extends('layouts.Cabecera-secundaria')
@section('content')
	<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
	<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-desktop" aria-hidden="true"></i> Pedidos Online 24/7</li>
			</ul>
		</div>
		<div class="w3ls_logo_products_left">
			<h1><a>Productos</a></h1>
		</div>
		<div class="clearfix"> </div>
		</ol>
	</div>
</div>
<br>

<!-- productos -->
		<div class="container">
			@include('flash::message')
			<div class="row">
			@include('layouts.panel-izquierda')
			<div class="col-md-8">
				<div class="row">
				<!-- Muestra Productos -->
        @foreach($Productos as $Producto)
				<?php $precio_anterior=15000+$Producto->precio; ?>
					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="itemProducto">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="{{ route('detalle',['id'=>$Producto->id]) }}"><img title=" " alt=" " style="width: 150px; height: 150px;" src="/images/productos/{{ $Producto->imagen }}"></a>
												<p>{{ $Producto->nombre }}</p>
												<h4>${{ $Producto->precio }}<span>${{ $precio_anterior }}<span></h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
												<a href="{{ route('carro.añadir', ['id'=> $Producto->id]) }}" class="btn btn-success pull.right" role="button">Añadir al Carrito</a>
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
						</div>
						<br>
						</div>

				@endforeach
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		</div>
<!--- productos --->
@endsection
