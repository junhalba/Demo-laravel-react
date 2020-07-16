<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransferenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transferencias')->insert([[
            'description' => 'Salary',
            'amount' => '4800',
            'cliente_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'description' => 'Rent',
            'amount' => '-1200',
            'cliente_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]]);
    }
}
