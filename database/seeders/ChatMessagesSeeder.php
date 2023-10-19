<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ChatMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chat_messages')->insert([
            'menage_id' => 1,
            'user_id' => 1,
            'message' => 'holaa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('chat_messages')->insert([
            'menage_id' => 1,
            'user_id' => 2,
            'message' => 'adioos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}