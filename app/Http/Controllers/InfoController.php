<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
  public function Contacto()
  {
      return view('Informacion/Contacto');
  }
  public function Faq()
  {
      return view('Informacion/Faq');
  }
  public function About()
  {
      return view('Informacion/About');
  }
}
