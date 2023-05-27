<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Rekening;
use App\Models\Kategori;

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

    public function rekening()
    {
        return $this->belongsTo(Rekening::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
