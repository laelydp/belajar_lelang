<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'tgl',
        'harga_awal',
        'image',
        'deskripsi_barang'
    ];

    public function lelang ()
    {
        return $this->belongsTo(Lelang::class);
    }
}
