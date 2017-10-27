<!DOCTYPE html>
<html>
<head>
  <title>Confitería La Maestra</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Distribuidora cecinas y quesos, distribuidora chile, distribuidora cecinas, distribuidora quesos, quesos chile, cecinas chile" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
  		function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" type="text/css" href="/css/zoomslider.css" />
  <link rel="stylesheet" type="text/css" href="/css/style.css" />
  <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <script type="text/javascript" src="/js/modernizr-2.6.2.min.js"></script>
  <link href='/fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
  <link href='/fonts.googleapis.com/css?family=Lato:400,300,300italic,700' rel='stylesheet' type='text/css'>
  <link href='/fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
     <div class="header-bottom" id="home">
  		<div class="container">
  			<nav class="navbar navbar-default">
  				<div class="navbar-header">
  					<div class="logo">
  						<h1><a class="navbar-brand" href="{{ route('principal') }}"><span class="one">C</span>onfitería<span class="one">L</span>a<span class="one">M</span>estra</a></h1>
  					</div>
  				</div>
  				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
  					<nav class="cl-effect-1" id="cl-effect-1">
  						<ul class="nav navbar-nav">
  							<li class="active"><a href="{{ route('home') }}">Inicio</a></li>
  							<li><a href="{{ route('productos.index') }}">Productos</a></li>
  							<li><a href="{{ route('contacto') }}">Contacto</a></li>
  							<li><a href="{{ route('faq') }}">FAQ</a></li>
  						</ul>
  					</nav>
  				</div>
  			</nav>
  		</div>
    </div>
    @yield('content')
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.zoomslider.min.js"></script>
    				<script src="js/main.js"></script>
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
    			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
    				<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    				<script type="text/javascript">
    					$(document).ready(function () {
    						$('#horizontalTab').easyResponsiveTabs({
    							type: 'default',
    							width: 'auto',
    							fit: true,
    						});
    					});
    				</script>
    			<script src="js/jquery.picEyes.js"></script>
    				<script>
    					$(function(){
    						$('.demo li').picEyes();
    					});
    				</script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
    			jQuery(document).ready(function($) {
    				$(".scroll").click(function(event){
    					event.preventDefault();
    					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
    				});
    			});
    </script>
     <script type="text/javascript">
    						$(document).ready(function() {
    							var defaults = {
    					  			containerID: 'toTop', // fading element id
    								containerHoverID: 'toTopHover', // fading element hover id
    								scrollSpeed: 1200,
    								easingType: 'linear'
    					 		};
    							$().UItoTop({ easingType: 'easeOutQuart' });
    						});
    					</script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
