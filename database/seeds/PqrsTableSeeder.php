<?php

use Illuminate\Database\Seeder;

class PqrsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pqrs')->insert(
            [
                'inventory_id' => 1,
                'description' => 'El televisor no enciende',
                'state' => True,
            ]
        );
    }
}
