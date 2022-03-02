<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'ruolo' => 'admin',
        ]);
        DB::table('user_roles')->insert([
            'ruolo' => 'user',
        ]);
    }
}
