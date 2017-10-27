<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="panel.php" class="logo">
      <span class="logo-mini"><b><i class="fa fa-street-view"></i></b></span>
      <span class="logo-lg"><b>USUARIO</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
              <a href="{{ route('logout') }}" style="color: white;"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Cerrar Sesión
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </a>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-home"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/images/default-user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          @foreach($misdatos as $user)
          <p>{{ $user->nombre }} {{ $user->apellido }}</p>
          @endforeach
          <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">&nbsp;</li>
        <li class="active"><a href="{{ route('user.panel') }}"><i class="fa fa-truck"></i> Mis Pedidos</a></li>
        <li><a href="{{ route('user.mis_datos') }}"><i class="fa fa-user"></i> <span>Mi cuenta</span></a></li>
      </ul>
    </section>
  </aside>
  @yield('content')
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>©2017 Confitería La Maestra. Todos los Derechos Reservados</strong>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    </ul>
    <h3 class="control-sidebar-heading"><center>Paginas</center></h3>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <ul class="control-sidebar-menu">
          <li>
            <a href="{{ route('principal') }}">
              <i class="menu-icon fa fa-home bg-orange"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Inicio</h4>
              </div>
            </a>
          </li>
          <li>
            <a href="{{ route('productos.index') }}">
              <i class="menu-icon fa fa-tags bg-red"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Productos</h4>
              </div>
            </a>
          </li>
          <li>
            <a href="{{ route('Carro.index') }}">
              <i class="menu-icon fa fa-shopping-cart bg-green"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Carro de compras</h4>
              </div>
            </a>
          </li>
          <li>
            <a href="{{ route('faq') }}">
              <i class="menu-icon fa fa-question bg-yellow"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Preguntas Frecuentes</h4>
              </div>
            </a>
          </li>
          <li>
            <a href="{{ route('about') }}">
              <i class="menu-icon fa fa-send bg-blue"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Sobre Nosotros</h4>
              </div>
            </a>
          </li>
          <li>
            <a href="{{ route('contacto') }}">
              <i class="menu-icon fa fa-phone bg-purple"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Contacto</h4>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
