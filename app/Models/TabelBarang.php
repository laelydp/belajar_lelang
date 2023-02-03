<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lelang;
class TabelBarang extends Model
{
    use HasFactory;
    protected $table = 'tabel_barangs';
    protected $fillable = [
        'nama_barang', 
        'tgl',
        'harga_awal',
        'deskripsi_barang'
    ];

    public function lelang ()
    {
        return $this->belongsTo(Lelang::class);
    }
}
