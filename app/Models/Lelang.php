<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TabelBarang;
class Lelang extends Model
{
    use HasFactory;
    protected $table = "lelangs";
    protected $fillable = [
        'barangs_id',
        'users_id',
        'harga_akhir',
        'tanggal_lelang',
        'status'

    ];

public function tabelbarang()
{
    return $this->hasOne('App\Models\TabelBarang',
    'id', 'barangs_id');
}

}
