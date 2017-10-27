<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Admin;
use App\Categorias;
use App\Estado;
use App\Marcas;
use App\Productos;
use App\User;
use Carbon\Carbon;
use Input;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $date = Carbon::now();
      $año_actual=$date->format('Y');
      $mes_actual=$date->format('m');
      $misdatos=DB::table('admins')
      ->select('*')
      ->where('id','=',Auth::id())
      ->get();
      $pedidos=DB::table('orders')
      ->join('estado','orders.id_estado','=','estado.id')
      ->join('users','orders.id_usuario','=','users.id')
      ->select('orders.*','estado.descripcion as descripcion','users.nombre','users.apellido','users.direccion')
      ->orderBy('id','asc')
      ->get();
      $pedidos_mensual=DB::table('orders')
      ->join('estado','orders.id_estado','=','estado.id')
      ->join('users','orders.id_usuario','=','users.id')
      ->select('orders.*','estado.descripcion as descripcion','users.nombre','users.apellido','users.direccion')
      ->whereMonth('orders.created_at','=',$mes_actual)
      ->whereYear('orders.created_at','=',$año_actual)
      ->count();
      $pedidos_total=DB::table('orders')
      ->join('estado','orders.id_estado','=','estado.id')
      ->join('users','orders.id_usuario','=','users.id')
      ->select('orders.*','estado.descripcion as descripcion','users.nombre','users.apellido','users.direccion')
      ->count();
      $completados=DB::table('orders')->select('*')->whereMonth('created_at','=',$mes_actual)
      ->whereYear('created_at','=',$año_actual)->where('id_estado','=',3)->count();
      $porcentaje=number_format(($completados/$pedidos_total)*100,2,'.','');
      $usuarios=DB::table('users')->select('*')->count();
      $productos=DB::table('productos')->select('*')->count();
        return view('Administrador/admin')
        ->with('usuarios',$usuarios)
        ->with('productos',$productos)
        ->with('misdatos',$misdatos)
        ->with('pedidos',$pedidos)
        ->with('mes_actual',$mes_actual)
        ->with('completados',$completados)
        ->with('porcentaje',$porcentaje)
        ->with('pedidos_mensual',$pedidos_mensual);
    }
    public function usuarios()
    {
      $misdatos=DB::table('admins')
      ->select('*')
      ->where('id','=',Auth::id())
      ->get();
      return view('Administrador/usuarios')
      ->with('misdatos',$misdatos)
      ->with('admins',Admin::all())
      ->with('usuarios',User::all());
    }
    public function agregar()
    {
      $misdatos=DB::table('admins')
      ->select('*')
      ->where('id','=',Auth::id())
      ->get();
      return view('Administrador/agregar_productos')
      ->with('misdatos',$misdatos)
      ->with('categorias',Categorias::all())
      ->with('marcas',Marcas::all());
    }
    public function agregar_producto(Request $request)
    {
      ($request);
      if($request->id==1)
      {
        $this->validate($request,[
          'categoria'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
        ]);
        $new_categoria=new Categorias;
        $new_categoria->nombre=$request->categoria;
        $new_categoria->save();
        flash('Categoría Agregada!');
        return redirect()->back();
      }
      else
      {
        if($request->id==2)
        {
          $this->validate($request,[
            'marca'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
          ]);
          $new_marca=new Marcas;
          $new_marca->nombre=$request->marca;
          $new_marca->save();
          flash('Marca Agregada!');
          return redirect()->back();
        }
        else {
          if($request->id==3)
          {
            if($request->imagen==null)
            {
              $this->validate($request,[
                'nombre'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:100',
                'marca'=>'required',
                'categorias'=>'required',
                'descripcion'=>'required|string|min:2|max:100',
                'precio'=>'required|numeric',
              ]);
              $new_producto=new Productos;
              $new_producto->nombre=$request->nombre;
              $new_producto->idCategoria=$request->categorias;
              $new_producto->idMarca=$request->marca;
              $new_producto->descripcion=$request->descripcion;
              $new_producto->imagen=' ';
              $new_producto->precio=$request->precio;
              $new_producto->save();
              flash('Producto Agregado!');
              return redirect()->back();
            }
            else
            {
              $this->validate($request,[
                'nombre'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:100',
                'marca'=>'required',
                'categorias'=>'required',
                'descripcion'=>'required|string|min:2|max:100',
                'precio'=>'required|numeric',
              ]);
              $new_producto=new Productos;
              $new_producto->nombre=$request->nombre;
              $new_producto->idCategoria=$request->categorias;
              $new_producto->idMarca=$request->marca;
              $new_producto->descripcion=$request->descripcion;
              $new_producto->imagen=$request->nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
              $new_producto->precio=$request->precio;
              $new_producto->save();
              $nombre = $new_producto->nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
              $request->file('imagen')->move(base_path() . '/public/images/productos/', $nombre);
              flash('Producto Agregado!');
              return redirect()->back();
            }
          }
          else {
            return redirect()->back();
          }
        }
      }
    }
    public function editar()
    {
      $misdatos=DB::table('admins')
      ->select('*')
      ->where('id','=',Auth::id())
      ->get();
      return view('Administrador/editar_productos')
      ->with('misdatos',$misdatos)
      ->with('productos',Productos::all())
      ->with('marcas',Marcas::all())
      ->with('categorias',Categorias::all());
    }
    public function editar_producto(Request $request)
    {
      $this->validate($request,[
        'nombre'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
        'marca'=>'required',
        'categorias'=>'required',
        'descripcion'=>'required|string|min:2|max:20',
        'precio'=>'required|numeric',
      ]);
      $imagen=$request->file('imagen');
      if($imagen!=null)
      {
        $nombre_imagen=$request->nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
        $actualizar=DB::table('productos')->where('id','=',$request->id)
        ->update(['nombre'=>$request->nombre,'idCategoria'=>$request->categorias,'idMarca'=>$request->marca,
        'descripcion'=>$request->descripcion,'imagen'=>$nombre_imagen,'precio'=>$request->precio]);
        $request->file('imagen')->move(base_path() . '/public/images/productos/', $nombre_imagen);
        flash('Actualizado con Éxito!');
        return redirect()->back();
      }
      else {
        {
          $actualizar=DB::table('productos')->where('id','=',$request->id)
          ->update(['nombre'=>$request->nombre,'idCategoria'=>$request->categorias,'idMarca'=>$request->marca,
          'descripcion'=>$request->descripcion,
          'precio'=>$request->precio]);
          flash('Actualizado con Éxito!');
          return redirect()->back();
        }
      }
    }
    public function eliminar_producto(Request $request)
    {
      if($request->eliminar=='cat')
      {
        $eliminar=DB::table('categorias')->where('id','=',$request->id)->delete();
        flash('Categoría eliminada!');
        return redirect()->back();
      }
      else
      {
        if($request->eliminar=='mar')
        {
          $eliminar=DB::table('marca')->where('id','=',$request->id)->delete();
          flash('Marca eliminada!');
          return redirect()->back();
        }
        else
        {
          $eliminar=DB::table('productos')->where('id','=',$request->id)->delete();
          flash('Producto eliminada!');
          return redirect()->back();
        }
      }
    }
    public function pedidos($id)
    {
      $misdatos=DB::table('admins')
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
      return view('Administrador/pedidos')
      ->with('misdatos',$misdatos)
      ->with('pedidos',$pedidos)
      ->with('informacion',$informacion);
    }
    public function fecha_entrega(Request $request)
    {
      //dd($request);
      $actualizar=DB::table('orders')->where('id','=',$request->idCompra)
      ->update(['fecha_entrega'=>$request->datepicker,'id_estado'=>3]);
      flash('Fecha de entrega definida!');
      return redirect()->back();
    }

}
