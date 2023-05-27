<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Kategori::insert([
            'kategori' => 'kendaraan',
            'tipe' => 'pengeluaran'
        ]);
        Kategori::insert([
            'kategori' => 'makanan',
            'tipe' => 'pengeluaran'
        ]);
        Kategori::insert([
            'kategori' => 'gadget',
            'tipe' => 'pengeluaran'
        ]);
        Kategori::insert([
            'kategori' => 'gaji',
            'tipe' => 'pendapatan'
        ]);
        Kategori::insert([
            'kategori' => 'kiriman',
            'tipe' => 'pendapatan'
        ]);
    }
}
