<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MenageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menages')->insert([
           'name'=>'Cucu house',
           'description'=>'La casa de los cucus',
           "address"=>'Calle paraje de patenra nº 1',
           'color'=>'#CAF787'
        ]);
    }
}
