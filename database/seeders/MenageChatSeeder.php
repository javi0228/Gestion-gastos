<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class MenageChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menage_chats')->insert([
            'menage_id' => 1
        ]);
    }
}