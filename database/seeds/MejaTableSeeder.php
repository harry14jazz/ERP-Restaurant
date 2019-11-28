<?php

use Illuminate\Database\Seeder;

class MejaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meja')->insert([
            'nomor_meja' => 'A1'
        ]);
        DB::table('meja')->insert([
            'nomor_meja' => 'B1'
        ]);
    }
}
