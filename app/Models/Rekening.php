<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Transaksi;

class Rekening extends Model
{
    use HasFactory;
    protected $table = "rekening";

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
