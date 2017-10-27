<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }
    public function panel()
    {
      $misdatos=DB::table('users')
      ->select('*')
      ->where('id','=',Auth::id())
      ->get();
      $pedidos=DB::table('orders')
      ->join('estado','orders.id_estado','=','estado.id')
      ->join('users','orders.id_usuario','=','users.id')
      ->select('orders.*','estado.descripcion as descripcion','users.nombre','users.apellido','users.direccion')
      ->where('orders.id_usuario','=',Auth::id())
      ->orderBy('orders.id','asc')
      ->get();
      //dd($pedidos);
      return view('user/user')
      ->with('misdatos',$misdatos)
      ->with('pedidos',$pedidos);
    }
    public function detalle($id)
    {
      $misdatos=DB::table('users')
      ->select('*')
      ->where('id','=',Auth::id())
      ->get();
      $informacion=DB::table('orders')
      ->join('users','orders.id_usuario','=','users.id')
      ->join('estado','orders.id_estado','=','estado.id')
      ->select('orders.id as order_id','orders.total as orders_total','orders.codigo as orders_codigo',
      'orders.fecha_entrega as orders_fecha_entrega','orders.created_at as orders_fecha_creada',
      'orders.id_estado as orders_id_estado','users.nombre as users_nombre','users.direccion as users_direccion',
      'users.telefono as users_telefono','users.email as users_email','estado.descripcion as estado_descripcion')
      ->where('orders.id','=',$id)
      ->first();
      $pedidos=DB::table('orders')
      ->join('detalle','orders.id','=','detalle.id_orders')
      ->join('productos','detalle.id_producto','=','productos.id')
      ->join('marca','productos.idMarca','=','marca.id')
      ->select('detalle.cantidad as detalle_cantidad',
      'detalle.total as detalle_total','detalle.cantidad as detalle_cantidad','productos.id as productos_id',
      'productos.nombre as producto_nombre','productos.descripcion as productos_descripcion',
      'productos.precio as producto_precio','marca.nombre as marca_nombre')
      ->where('orders.id','=',$id)
      ->get();
      //dd($pedido);
      //dd($informacion);
      return view('user/detalle')
      ->with('misdatos',$misdatos)
      ->with('pedidos',$pedidos)
      ->with('informacion',$informacion);
    }
    public function validar_pedido(Request $request)
    {
      //dd($request);
      $this->validate($request,[
        'codigo'=>'required|min:2|max:20',
      ]);
      $actualizar=DB::table('orders')->where('id','=',$request->idCompra)
      ->update(['codigo'=>$request->codigo,'id_estado'=>1]);
      flash('Código ingresado con éxito');
      return redirect()->back();
    }
    public function mis_datos()
    {
      $misdatos=DB::table('users')
      ->select('*')
      ->where('id','=',Auth::id())
      ->get();
      //dd($pedidos);
      return view('user/mis_datos')
      ->with('misdatos',$misdatos);
    }
    public function actualizar(Request $request)
    {
      //dd($request);
      $this->validate($request,[
        'nombre'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
        'apellido'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
        'direccion'=>'required|string|min:2|max:20',
        'rut'=>'required',
        'telefono'=>'required|string|min:9|max:9',
        'email'=>'required|email',
      ]);
      $actualizar=DB::table('users')->where('id','=',$request->id)
      ->update(['nombre'=>$request->nombre,'apellido'=>$request->apellido,'rut'=>$request->rut,'direccion'=>$request->direccion,
      'telefono'=>$request->telefono,'email'=>$request->email]);
      flash('Datos Actualizado!');
      return redirect()->back();
    }
}
