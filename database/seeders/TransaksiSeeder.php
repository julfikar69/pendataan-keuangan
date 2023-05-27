<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = \Carbon\Carbon::now();
        Transaksi::create([
            'rekening_id' => '1',
            'kategori_id' => '1',
            'jumlah' => '66000',
            'keterangan' => 'Test Dari Seeder #1',
            'tanggal' => $date
        ]);
        Transaksi::create([
            'rekening_id' => '2',
            'kategori_id' => '2',
            'jumlah' => '91100',
            'keterangan' => 'Test Dari Seeder #2',
            'tanggal' => $date
        ]);
    }
}
