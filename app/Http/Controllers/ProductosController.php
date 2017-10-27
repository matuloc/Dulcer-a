<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Categorias;

class ProductosController extends Controller
{
  public function index()
  {
    return view('Productos/Index')
    ->with('Productos',Productos::all())
    ->with('Categorias',Categorias::all());
  }
  public function Detalle($id)
  {
    //dd($id);
    $Detalles=Productos::where('id','=',$id)->get();
    return view('Productos/detalle')
    ->with('Productos',$Detalles)
    ->with('Categorias',Categorias::all());
  }
  public function Categorias($id)
  {
    $productos_categorias=Productos::where('idCategoria','=',$id)->get();
    return view('Productos/categorias')
    ->with('Productos',Productos::all())
    ->with('Categorias',Categorias::all())
    ->with('productos_categorias',$productos_categorias);
  }
}
