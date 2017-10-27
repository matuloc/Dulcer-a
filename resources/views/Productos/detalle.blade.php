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
			@include('layouts.panel-izquierda')
			<div class="row">

				<!-- Muestra Productos -->
        @foreach($Productos as $Producto)
				<?php $precio_anterior=15000+$Producto->precio; ?>
							<div class="col-md-4">
								<img id="example" style="width: 300px; height: 300px;" src="/images/productos/{{ $Producto->imagen }}" alt=" " class="img-responsive">
							</div>
							<h2>{{ $Producto->nombre }}</h2>
								<div class="w3agile_description">
									<h4>Descripción:</h4>
									<p>{{ $Producto->descripcion }}</p>
								</div>
								<div class="snipcart-item block">
									<div class="snipcart-thumb agileinfo_single_right_snipcart">
										<h4 class="m-sing">${{ $Producto->precio }}<span>${{ $precio_anterior }}</span></h4>
									</div>
									<a href="{{ route('carro.añadir', ['id'=> $Producto->id]) }}" class="btn btn-success pull.right" role="button">Añadir al Carrito</a>
									</div>
								</div>
				@endforeach
			<div class="clearfix"> </div>
		</div>
		</div>
		<br>
<!--- productos --->
@endsection
