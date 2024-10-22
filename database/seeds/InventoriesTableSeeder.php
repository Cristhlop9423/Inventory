<?php

use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('inventories')->insert(
            [
                'name' => 'Televisor',
                'location' => 'Biblioteca',
                'state' => True,
            ]
        );
        DB::table('inventories')->insert(
            [
                'name' => 'Televisor',
                'location' => 'Aula 503',
                'state' => False,
            ]
        );
        DB::table('inventories')->insert(
            [
                'name' => 'Ventilador',
                'location' => 'Aula 503',
                'state' => True,
            ]            
        );
    }
}
