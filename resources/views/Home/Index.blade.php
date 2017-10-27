@extends('layouts.Cabecera-principal')
@section('content')
	<div id="demo-1" data-zs-src='["images/dulces-1.jpg", "images/dulces-2.jpg", "images/dulces-3.jpg","images/dulces-4.jpg"]' data-zs-overlay="dots">
		<div class="demo-inner-content">
			   <div class="baner-info">
			      <h3>Tu <span>Distribuidor</span> de <span>Alta</span> Calidad</h3>
				  <h4>Confitería La Maestra</h4>
				  <span><img src="images/logo2.png" alt=""></span>
			   </div>
		</div>
    </div>
	</div>
<div class="featured-section" id="projects">
  <div class="container">
		<h3 class="tittle">Nuestros <span>Productos</span></h3>
				<ul id="flexiselDemo1">
          @foreach($Productos as $Producto)
					<li><div class="project-fur">
						<a href="#" data-toggle="modal" data-target="#myModal1" ><img class="img-responsive" style="width: 350px; height: 240px;" src="/images/productos/{{ $Producto->imagen }}" alt="" />	</a>
						<div class="fur">
							<div class="fur1">
								<h6 class="fur-name">{{ $Producto->nombre }}</h6>
              </div>
              <div class="fur2">
			          <h6 class="fur-name"><a href="{{ route('detalle',['id'=>$Producto->id]) }}">VER MAS</a></h6>
			         </div>
						</div>
						<span class="five">${{ $Producto->precio }} CLP</span>
					</div></li>
          @endforeach
				</ul>
	</div>
</div><div class="clearfix"> </div>
<div class="agitsworkw3ls" id="property">
			<div class="col-md-6 agitsworkw3ls-grid ">
       <h3 class="tittle two">Quienes <span>Somos</span>?</h3>
				<div class="tabs">
					<div class="sap_tabs">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul class="resp-tabs-list">
								<li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab"><span>QUE OFRECEMOS</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>MISION</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>VISION</span></li>
								<div class="clearfix"></div>
							</ul>
							<div class="resp-tabs-container">
								<h3 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>QUE OFRECEMOS</h3><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
									<p>La distribuidora Jaime Sepulveda e Hijos Ltda. se basa en ofrecer al cliente un distribuidor eficiente de quesos y cecinas, con productos frescos, de excelente calidad y marcas reconocidas para abastecer la demanda de cualquier tipo de negocio que trabaje con este tipo de productos.</p>
								</div>
								<h3 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>MISION</h3><div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
									<p>La misión de esta pyme en el mercado Chileno es la distribución de quesos y cecinas no dirigiéndose exclusivamente a comerciantes sino que también al público en general logrando un crecimiento sostenido y rentable, líder en la distribución de fiambres de la más alta calidad dejando a disposición de los clientes un distribuidor 24/7 marcando una ventaja competitiva que diferencia a esta pyme de las demás distribuidoras que no se limitaría a una distribución solo en días hábiles, sino que el cliente puede quedarse sin stock en cualquier momento y tener sin problemas una reposición cualquier día de la semana.</p>
								</div>
								<h3 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>VISION</h3><div class="tab-3 resp-tab-content" aria-labelledby="tab_item-2">
									<p>La visión que presenta esta pyme es llegar a ser una empresa destacada en el rubro alimenticio, logrando una cobertura nacional inigualable con puntos estratégicos de distribución a lo largo de todo el país y con los estándares de calidad más altos dentro de la industria.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 agitsworkw3ls-grid-2">
			   <div class="info-imgs">
			         <ul>
					  <li>
						  <div class="gallery-grid1">
								<img src="images/g11.jpg" alt=" " class="img-responsive">
								<div class="p-mask">
										<h4>Todo <span>Quesos</span></h4>
									<p>La mas fina seleccion en quesos de las mejores marcas del mercado.</p>
								</div>
							</div>
					  </li>
					   <li>
					     <div class="gallery-grid1">
							<img src="images/g12.jpg" alt=" " class="img-responsive">
							<div class="p-mask">
									<h4>Satisfacción <span>Garantizada</span></h4>
								<p>Servicio 24/7 para todo publico.</p>
							</div>
						</div>
					   </li>
						<li>
						   <div class="gallery-grid1">
							<img src="images/g21.jpg" alt=" " class="img-responsive">
							<div class="p-mask">
									<h4>Envios <span>a</span> Domicilio</h4>
								<p>El mejor servicio a la comodidad de tu hogar.</p>
							</div>
						</div>
						</li>
					    <li>
						  <div class="gallery-grid1">
							<img src="images/g22.jpg" alt=" " class="img-responsive">
							<div class="p-mask">
									<h4>Todo <span>Cecinas</span></h4>
								<p>Los productos destacados en cecinas que necesitas.</p>
							</div>
						</div>
						</li>
					 </ul>
			   </div>
			</div>
			<div class="clearfix"></div>
		</div>
	<div id="contacto" class="contacto">
		<div class="container">
			<div class="w3l-heading">
				<div class="container">&nbsp;</div>
				<h3 class="tittle three">Contacto <span>!</span></h3>
				<div class="w3ls-border"> </div>
			</div>
			<div class="contacto-row agileits-w3layouts">
				<div class="col-md-6 col-sm-6 contacto-w3lsleft">
					<div class="contacto-grid agileits">
						<h4>ESCRIBENOS</h4>
						<form name="contactform" method="post" action="send_form_email.php">
							<input type="text" name="name" placeholder="Nombre" required="">
							<input type="email" name="email" placeholder="Correo" required="">
							<textarea name="message" placeholder="Mensaje..." required=""></textarea>
							<input type="submit" value="ENVIAR" >
						</form>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 contacto-w3lsright">
					<div class="address-row w3-agileits">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Correo</h5>
							<p><a href="mailto:contacto@distribuidorajsh.cl"> contacto@distribuidorajsh.cl</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Llamanos</h5>
							<p>(+56) 9 8811 0038</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div>
			<div>&nbsp;</div>
		</div>
	</div>
	<div class="contact-w3ls" id="contact">
		<h3 class="text-center follow">Expertos en calidad</h3>
		<div class="w3agile_footer_copy">
			<p>©2017 Confitería La Maestra. Todos los Derechos Reservados</p>
		</div>
	</div>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
@endsection
