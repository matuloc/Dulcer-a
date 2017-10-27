<?php

use Illuminate\Database\Seeder;
use App\Productos;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('productos')->delete();
      Productos::create( [
        'nombre' => 'Cecinas 1',
        'idCategoria' => 1,
        'idMarca' => 1,
        'descripcion' => 'Descripcion Cecina 1',
        'imagen' => 'c1.png',
        'precio' => 15000,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Queso Gauda calidad premium San Jorge',
        'idCategoria' => 2,
        'idMarca' => 2,
        'descripcion' => 'Descripcion Queso 1',
        'imagen' => 'c2.png',
        'precio' => 17000,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Cecinas 2',
        'idCategoria' => 1,
        'idMarca' => 3,
        'descripcion' => 'Descripcion Cecina 2',
        'imagen' => 'c3.png',
        'precio' => 45000,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Queso Cheddar',
        'idCategoria' => 2,
        'idMarca' => 4,
        'descripcion' => 'Descripcion Queso 2',
        'imagen' => 'c4.png',
        'precio' => 36000,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Queso 3',
        'idCategoria' => 2,
        'idMarca' => 4,
        'descripcion' => 'Descripcion Queso 3',
        'imagen' => 'c5.png',
        'precio' => 38000,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Cecinas 3',
        'idCategoria' => 1,
        'idMarca' => 5,
        'descripcion' => 'Descripcion Cecina 3',
        'imagen' => 'c6.png',
        'precio' => 46600,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Jamon Praga Ahumado',
        'idCategoria' => 1,
        'idMarca' => 6,
        'descripcion' => 'Jamon Fila Selección de 13kg. la pieza',
        'imagen' => '500427_images.jpg',
        'precio' => 58890,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Jamon Paris',
        'idCategoria' => 1,
        'idMarca' => 5,
        'descripcion' => 'Jamon Paris 14kg. por pieza aproximada',
        'imagen' => '824035_Jamon-Paris-1.png',
        'precio' => 26480,
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Productos::create( [
        'nombre' => 'Jamon de Pechuga de Pollo',
        'idCategoria' => 1,
        'idMarca' => 4,
        'descripcion' => 'Pieza de 16kg. de la mejor calidad',
        'imagen' => '296478_jamon_nosotros-300x208.png',
        'precio' => 34990,
        'created_at' => date('Y-m-d h:i:s')
      ] );
    }
}
