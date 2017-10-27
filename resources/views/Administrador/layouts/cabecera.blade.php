<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
 <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
 <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" href="/plugins/iCheck/all.css">
 <link rel="stylesheet" href="/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
 <link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">
 <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
  <a href="{{ route('admin.principal') }}" class="logo">
    <span class="logo-mini"><b>A</b></span>
    <span class="logo-lg"><b>Administrador</b></span>
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
          <a href="{{ route('principal') }}"><i class="fa fa-home"></i></a>
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
        @foreach($misdatos as $admin)
        <p>{{ $admin->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
      </div>
    </div>
@endforeach
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">&nbsp;</li>
      <li class="active"><a href="{{ route('admin.principal') }}"><i class="fa fa-dashboard"></i> <span>Panel de Control</span></a></li>
      <li><a href="{{ route('admin.usuarios') }}"><i class="fa fa-dropbox"></i> <span>Usuarios</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-tags"></i><span>Productos</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.agregar') }}"><i class="fa fa-plus"></i> Agregar al Inventario</a></li>
          <li><a href="{{ route('admin.editar') }}"><i class="fa fa-retweet"></i> Eliminar o Actualizar</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>
  @yield('content')
<footer class="main-footer">
  <strong>©2017 Confitería La Maestra. Todos los Derechos Reservados</strong>
</footer>
<div class="control-sidebar-bg"></div>
</div>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
<script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/dist/js/demo.js"></script>
<script>
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        autoclose: true
    });
</script>
<script src="/js/app.js"></script>
</body>
</html>
