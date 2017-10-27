<!DOCTYPE html>
<html>
<head>
  <title>Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Distribuidora cecinas y quesos, distribuidora chile, distribuidora cecinas, distribuidora quesos, quesos chile, cecinas chile" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
  		function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="/css2/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/css2/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" type="text/css" href="css2/jquery-ui-1.css">
  <link href="/css2/font-awesome.css" rel="stylesheet">
  <script src="/js/jquery-1.11.1.min.js"></script>
  <link href='/fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='/fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="/js/move-top.js"></script>
  <script type="text/javascript" src="/js/easing.js"></script>
  <script type="text/javascript">
  	jQuery(document).ready(function($) {
  		$(".scroll").click(function(event){
  			event.preventDefault();
  			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
  		});
  	});
  </script>
  <style>
  .itemProducto{
    min-height: 360px;
    padding-top: 0px;
    max-height: 360px;
  }
  </style>
</head>
<body>
  	<div class="agileits_header">
  		<div class="container">
  			<div class="w3l_offers">
  				<p>CONFITERÍA LA MAESTRA</p>
  			</div>
  			<div class="agile-login">
  				<ul>
            @if (Auth::guest())
              <li><a href="{{ url('login') }}">Mi Cuenta</a></li>
                @else
                  <li class="dropdown">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#"><b>{{ strtoupper(Auth::user()->nombre) }}</b></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('user.panel') }}" style="color:black;">Mi cuenta</a></li>
                          <li>
                              <a href="{{ route('logout') }}" style="color: black;"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Salir
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                    </li>
                  </li>
                @endif
  					<li><a href="{{ route('contacto') }}">Ayuda</a></li>
            @if (Cart::count()>0)
              <li><a href="{{ route('Carro.index') }}"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i><span class="badge">{{ Cart::count() }}</span></a></li>
            @else
            <li><a href="#"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i></a></li>
            @endif
  				</ul>
  			</div>
  			<div class="clearfix"> </div>
  		</div>
  	</div>
  	<div class="navigation-agileits">
  		<div class="container">
  			<nav class="navbar navbar-default">
  							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
  								<ul class="nav navbar-nav">
  									<li><a href="{{ route('principal') }}" class="act">Inicio</a></li>
                    <li><a href="{{ route('productos.index') }}">Productos</a></li>
  									<li><a href="{{ route('faq') }}">Preguntas Frecuentes</a></li>
  									<li><a href="{{ route('contacto') }}">Contacto</a></li>
  								</ul>
  							</div>
  							</nav>
  			</div>
  		</div>
    @yield('content')
    @include('layouts.Footer')
    <script src="/js/bootstrap.min.js"></script>
    	<script type="text/javascript">
    		$(document).ready(function() {
    			$().UItoTop({ easingType: 'easeOutQuart' });
    			});
    	</script>
    <script src="/js/skdslider.min.js"></script>
    <link href="/css2/skdslider.css" rel="stylesheet">
    <script type="text/javascript">
    		jQuery(document).ready(function(){
    			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
    			jQuery('#responsive').change(function(){
    			  $('#responsive_wrapper').width(jQuery(this).val());
    			});
    		});
    </script>
    <script type="text/javascript">
      $(function() {
        var menu_ul = $('.faq > li > ul'),
             menu_a  = $('.faq > li > a');
        menu_ul.hide();
        menu_a.click(function(e) {
          e.preventDefault();
          if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
          } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
          }
        });
      });
    </script>
    <script src="/js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
		<!-- search-jQuery -->
				<script src="/js/main.js"></script>
			<!-- //search-jQuery -->
					<script type="text/javascript">
						$(window).load(function() {
							$("#flexiselDemo1").flexisel({
								visibleItems:3,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
						    	responsiveBreakpoints: {
						    		portrait: {
						    			changePoint:480,
						    			visibleItems: 1
						    		},
						    		landscape: {
						    			changePoint:640,
						    			visibleItems: 2
						    		},
						    		tablet: {
						    			changePoint:768,
						    			visibleItems: 2
						    		}
						    	}
						    });

						});
			</script>
</body>
</html>
