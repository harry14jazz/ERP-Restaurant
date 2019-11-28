<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            'order_number' => 'ERP27112019-001',
            'user_id'      => 1,
            'meja_id'      => 1,
            'menu_id'      => 1,
            'status'       => 1
        ]);

        DB::table('order')->insert([
            'order_number' => 'ERP27112019-002',
            'user_id'      => 1,
            'meja_id'      => 1,
            'menu_id'      => 3,
            'status'       => 1
        ]);

        DB::table('order')->insert([
            'order_number' => 'ERP27112019-003',
            'user_id'      => 2,
            'meja_id'      => 2,
            'menu_id'      => 2,
            'status'       => 1
        ]);

        DB::table('order')->insert([
            'order_number' => 'ERP27112019-004',
            'user_id'      => 2,
            'meja_id'      => 2,
            'menu_id'      => 4,
            'status'       => 1
        ]);

        DB::table('order')->insert([
            'order_number' => 'ERP27112019-005',
            'user_id'      => 1,
            'meja_id'      => 2,
            'menu_id'      => 3,
            'status'       => 0
        ]);
    }
}
