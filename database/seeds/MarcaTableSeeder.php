<?php

use Illuminate\Database\Seeder;
use App\Marcas;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('marca')->delete();
      Marcas::create( [
        'nombre' => 'Sopraval',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Marcas::create( [
        'nombre' => 'Colun',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Marcas::create( [
        'nombre' => 'San Jorge',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Marcas::create( [
        'nombre' => 'PF',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Marcas::create( [
        'nombre' => 'La Preferida',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Marcas::create( [
        'nombre' => 'Super Cerdo',
        'created_at' => date('Y-m-d h:i:s')
      ] );
    }
}
