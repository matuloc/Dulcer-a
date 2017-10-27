<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('estado')->delete();
      Estado::create( [
        'descripcion' => 'Por Verificar',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Estado::create( [
        'descripcion' => 'Pendiente',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Estado::create( [
        'descripcion' => 'Aprobado',
        'created_at' => date('Y-m-d h:i:s')
      ] );
      Estado::create( [
        'descripcion' => 'Rechazado',
        'created_at' => date('Y-m-d h:i:s')
      ] );
    }
}
