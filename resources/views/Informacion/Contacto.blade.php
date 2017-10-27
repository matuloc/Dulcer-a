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
			<h1><a>Contacto</a></h1>
		</div>
		<div class="clearfix"> </div>
		</ol>
	</div>
</div>
<!-- contact -->
	<div class="about">
		<div class="w3_agileits_contact_grids">
			<div class="col-md-6 w3_agileits_contact_grid_left">
				<div class="agileits_w3layouts_map_pos">
						<h3>Informacion de contacto</h3>
						<p>Atencion de 9:00am a 19:00pm</p>
						<i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:contacto@distribuidorajsh.cl">contacto@distribuidorajsh.cl</a><br>
						<i class="fa fa-phone" aria-hidden="true"></i><a>(+56) 9 8811 0038</a>
				</div>
			</div>
			<div class="col-md-6 w3_agileits_contact_grid_right">
				<h2 class="w3_agile_header">Dejanos un<span> Mensaje</span></h2>

				<form name="contactform" method="post" action="send_form_email.php">
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="text" id="input-25" name="name" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-25">
							<span class="input__label-content input__label-content--ichiro">Tu Nombre</span>
						</label>
					</span>
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="email" id="input-26" name="email" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-26">
							<span class="input__label-content input__label-content--ichiro">Tu Correo</span>
						</label>
					</span>
					<textarea name="message" placeholder="Tu mensaje aqui..." required=""></textarea>
					<input type="submit" value="Enviar">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- contact -->
@endsection
