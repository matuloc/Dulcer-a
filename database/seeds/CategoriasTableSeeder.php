<?php

use Illuminate\Database\Seeder;
use App\Categorias;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->delete();
      Categorias::create( [
        'nombre' => 'Cecinas',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Categorias::create( [
        'nombre' => 'Quesos',
        'created_at' => date('Y-m-d h:i:s')
      ] );
    }
}
