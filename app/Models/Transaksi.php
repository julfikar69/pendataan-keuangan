<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $fillable = [
        "kategori_id",
        "rekening_id",
        "jumlah",
        "keterangan",
        "tanggal"
    ];
}
