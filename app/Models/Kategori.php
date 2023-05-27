<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Transaksi;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
