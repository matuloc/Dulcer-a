<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call('CategoriasTableSeeder');
        $this->call('EstadoTableSeeder');
        $this->call('MarcaTableSeeder');
        $this->call('ProductosTableSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
