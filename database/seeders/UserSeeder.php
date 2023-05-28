<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Javi',
            'email' => 'javirodriguezbnk@gmail.com',
            'password' => Hash::make('28febrero'),
            'income' => 1000.00,
        ]);

        DB::table('users')->insert([
            'name' => 'Nerea',
            'email' => 'nerealop10@gmail.com',
            'password' => Hash::make('chato2012'),
            'income' => 600.00,
        ]);
    }
}
