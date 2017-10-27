<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Categorias;
use App\Marcas;
use App\Productos;
/*
|--------------------------------------------------------------------------
| Admin y Usuario
|--------------------------------------------------------------------------
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('user')->group(function(){
  Route::get('/mis_datos','HomeController@mis_datos')->name('user.mis_datos');
  Route::post('/mis_datos','HomeController@actualizar')->name('user.actualizar');
  Route::get('/detalle/{id}','HomeController@detalle')->name('user.detalle');
  Route::post('/detalle','HomeController@validar_pedido')->name('user.validar_pedido');
  Route::get('/','HomeController@panel')->name('user.panel');
});
Route::prefix('admin')->group(function(){
  Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/habilitar/{id}','AdminController@habilitar')->name('admin.habilitar');
  Route::get('/deshabilitar/{id}','AdminController@deshabilitar')->name('admin.deshabilitar');
  Route::get('/agregar_producto','AdminController@agregar')->name('admin.agregar');
  Route::post('/agregar_producto','AdminController@agregar_producto')->name('admin.agregar_producto');
  Route::get('/usuarios','AdminController@usuarios')->name('admin.usuarios');
  Route::get('/editar_producto','AdminController@editar')->name('admin.editar');
  Route::post('/editar_producto','AdminController@editar_producto')->name('admin.editar_producto');
  Route::post('/eliminar_producto','AdminController@eliminar_producto')->name('admin.eliminar_producto');
  Route::get('/pedidos/{id}','AdminController@pedidos')->name('admin.pedidos');
  Route::post('/pedidos','AdminController@fecha_entrega')->name('admin.fecha_entrega');
  Route::get('/', 'AdminController@index')->name('admin.principal');
});

/*
|--------------------------------------------------------------------------
| Página Principal
|--------------------------------------------------------------------------
 */
Route::get('/', 'PrincipalController@Index')->name('principal');

/*
|--------------------------------------------------------------------------
| Productos
|--------------------------------------------------------------------------
 */
Route::get('/Productos','ProductosController@Index')->name('productos.index');
Route::get('/Detalles/{id}','ProductosController@Detalle')->name('detalle');
Route::get('/Categoria/{id}','ProductosController@Categorias')->name('categorias');

/*
|--------------------------------------------------------------------------
| Información
|--------------------------------------------------------------------------
 */
Route::get('/Contacto','InfoController@Contacto')->name('contacto');
Route::get('/FAQ','InfoController@Faq')->name('faq');
Route::get('/Quienes_Somos','InfoController@About')->name('about');
/*
|--------------------------------------------------------------------------
| Carro de Compras
|--------------------------------------------------------------------------
 */
 Route::get('/Carro/Checkout','CartController@comprar')->name('carro.comprar');
 Route::resource('/Carro','CartController');
 Route::get('/Carro/agregar-item/{id}','CartController@addItem')->name('carro.añadir');
 /*
|------------------------------------------------------
| Ajax editar productos
|------------------------------------------------------
*/
Route::get('/editar',function(){
	$cat_id=Input::get('cat_id');
	if($cat_id!=0)
	{
		$info_productos=DB::table('productos')
    ->where('productos.id','=',$cat_id)->get();
		return Response::json($info_productos);
	}
});
Route::get('/eliminar_prod',function(){
	$cat_id=Input::get('id');
	if($cat_id!=null)
	{
    $info_productos=DB::table('productos')
    ->join('marca','productos.idMarca','=','marca.id')
    ->join('categorias','productos.idCategoria','=','categorias.id')
    ->select('productos.id as productos_id','productos.nombre as producto_nombre','productos.descripcion as productos_descripcion',
    'productos.precio as productos_precio','productos.imagen as productos_imagen',
    'marca.nombre as marca_nombre','categorias.nombre as categorias_nombre')
    ->where('productos.id','=',$cat_id)->get();
    return Response::json($info_productos);
	}
  else
  {
  }
});
Route::get('/eliminar_mar',function(){
	$cat_id=Input::get('id');
	if($cat_id!=null)
	{
    $info_marcas=DB::table('marca')
    ->select('*')
    ->where('id','=',$cat_id)->get();
    return Response::json($info_marcas);
	}
  else
  {
  }
});
Route::get('/eliminar_cat',function(){
	$cat_id=Input::get('id');
	if($cat_id!=null)
	{
    $info_categorias=DB::table('categorias')
    ->select('*')
    ->where('id','=',$cat_id)->get();
    return Response::json($info_categorias);
	}
  else
  {
  }
});

Route::get('/ultimos',function(){
  $cat_id=Input::get('cat_id');
  if($cat_id==1)
  {
    $ultimos=DB::table('categorias')
    ->select('*')
    ->orderBy('id','desc')->first();
    return Response::json($ultimos);
  }
  else
  {
    if($cat_id==2)
    {
      $ultimos=DB::table('marca')
      ->select('*')
      ->orderBy('id','desc')->first();
      return Response::json($ultimos);
    }
    else
    {
      $ultimos=DB::table('productos')
      ->join('marca','productos.idMarca','=','marca.id')
      ->join('categorias','productos.idCategoria','=','categorias.id')
      ->select('productos.*','marca.nombre as marca_nombre','categorias.nombre as categorias_nombre')
      ->orderBy('productos.id','desc')->first();
      return Response::json($ultimos);
    }
  }
});
