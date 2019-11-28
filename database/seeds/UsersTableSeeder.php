<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ERP Pelayan',
            'username' => 'pelayan1',
            'password' => bcrypt('1'),
            'role'     => 'Pelayan'
        ]);
        DB::table('users')->insert([
            'name' => 'ERP Kasir',
            'username' => 'kasir1',
            'password' => bcrypt('1'),
            'role'     => 'Kasir'
        ]);
    }
}
