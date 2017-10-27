<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class PrincipalController extends Controller
{
  public function index()
  {
      return view('Home/Index')->with('Productos',Productos::all());
  }
}
