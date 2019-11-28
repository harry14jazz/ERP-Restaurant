<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'nama_menu' => 'Fish & Chips',
            'jenis' => '1',
            'harga' => '35000',
            'status'     => '1'
        ]);
        DB::table('menu')->insert([
            'nama_menu' => 'Chicken Cordonbleu',
            'jenis' => '1',
            'harga' => '40000',
            'status'     => '1'
        ]);
        DB::table('menu')->insert([
            'nama_menu' => 'Lemon Tea',
            'jenis' => '0',
            'harga' => '15000',
            'status'     => '1'
        ]);
        DB::table('menu')->insert([
            'nama_menu' => 'Camomile Tea',
            'jenis' => '0',
            'harga' => '18000',
            'status'     => '1'
        ]);
    }
}
