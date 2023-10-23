<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_login')->insert([
            'name' => 'Admin',
            'username' => 'admin123',
            'password' => Hash::make('admin123')
        ]);
    }
}
