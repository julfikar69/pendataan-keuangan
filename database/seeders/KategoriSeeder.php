<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('kategori')->insert([
            'kategori' => 'kendaraan',
            'tipe' => 'pengeluaran'
        ]);
        DB::table('kategori')->insert([
            'kategori' => 'makanan',
            'tipe' => 'pengeluaran'
        ]);
        DB::table('kategori')->insert([
            'kategori' => 'gadget',
            'tipe' => 'pengeluaran'
        ]);
        DB::table('kategori')->insert([
            'kategori' => 'gaji',
            'tipe' => 'pendapatan'
        ]);
        DB::table('kategori')->insert([
            'kategori' => 'kiriman',
            'tipe' => 'pendapatan'
        ]);
    }
}
