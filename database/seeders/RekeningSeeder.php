<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Seeder;

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
        foreach ($rekening as $val){
            Rekening::insert([
                'rekening' => $val
            ]);
        }

    }
}
