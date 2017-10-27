@extends('layouts.Cabecera-secundaria')
@section('content')
<div class="deposito">
  <div class="container">
    <h2><a style="color:#7ac143;">Ya</a> casi esta listo<a style="color:#7ac143;">!</a></h2>
    <br>
    <center>
      <div>
        <center>Su pedido a sido procesado satisfactoriamente.</center>
        <p>
          <br>Para proceder al envio de su pedido debe realizar un <a>deposito de $10.000 pesos</a> como confirmacion de su compra que serán descontados de su total a pagar.
        </p>
      </div>
    </center>
    <div class="login-form-grids2 animated wow slideInUp" data-wow-delay=".5s">
        <center><a style="color: #000000; font-size:24px;">
          <br>DATOS DEPOSITO BANCARIO
          <br>
          <br>Cuenta Corriente
          <br>Titular: Jaime Sepulveda Burgos
          <br>Nro. Cuenta: 0084-0100096887
          <br>Rut: 10.981.567-5
          <br>Correo: jaime1969@live.cl
        </a></center>
    </div>
    <center>
      <p>
        <br>Recuerde que <a>el valor total es un aproximado</a> debido a que cada pieza tiene pesos variables por lo que nos esforzamos en mantener el standart.
        Tiene un <a>maximo de 48 horas</a> desde que se realizo el pedido, de lo contrario este pedido se cancelará cumplido el plazo.
      </p>
    </center>

    <h4>Luego de realizado el pago, entre a su
    <a href="{{ route('user.panel') }}">PANEL<span class="glyphicon glyphicon-menu-right" style="top: 4px;"></span>
    </a>y confirme el pedido</h4>

    <h4>GRACIAS POR SU COMPRA!</h4>
  </div>
</div>
@endsection
