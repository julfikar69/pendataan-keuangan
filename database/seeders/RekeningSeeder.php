<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rekening = [
            'BNI',
            'ShoppePay',
            'Gopay',
            'Dompet',
            'LinkAja'
        ];
        foreach($rekening as $val){
            DB::table('rekening')->insert([
                'rekening' => $val
            ]);
        }

    }
}
