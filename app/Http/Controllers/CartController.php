<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Productos;
use App\Order;
use App\Detalle;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems= Cart::content();
        return view('Carrito/carro')->with('cartItems',$cartItems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function addItem($id)
    {
        $producto= Productos::where('id', '=', $id)->firstOrFail();
        Cart::add($id,$producto->nombre,1,$producto->precio);
        flash('Producto agregado');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'qty'=>'numeric',
      ]);
      if(2000 >$request->qty)
        {
          Cart::update($id,['qty'=>$request->qty]);
            return back();
        }
        else
        {
          return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cart::remove($id);
      return back();
    }
    public function comprar()
    {
      if(Auth::check())
      {
        $user=Auth::user();
        $nueva_orden= new Order;
        $nueva_orden->id_usuario=$user->id;
        $nueva_orden->id_estado=2;
        $nueva_orden->total=Cart::subtotal();
        $nueva_orden->codigo=' ';
        $nueva_orden->fecha_entrega=' ';
        $nueva_orden->save();
        $cartItems=Cart::content();
        foreach ($cartItems as $cartItem)
        {
          $producto_detalle = new Detalle;
          $producto_detalle->id_orders = $nueva_orden->id;
          $producto_detalle->id_producto = $cartItem->id;
          $producto_detalle->cantidad = $cartItem->qty;
          $producto_detalle->total = $cartItem->qty*$cartItem->price;
          $producto_detalle->save();
        }
      	Cart::destroy();
        return view('/Carrito/checkout');
      }
      return view('auth.login');
    }
}
