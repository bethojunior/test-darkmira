<?php

use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : Void
    {
        DB::table('user_types')->insert([
            ['name' => 'Administrador'],
            ['name' => 'Cliente'],
        ]);
    }
}
