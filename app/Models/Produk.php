<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'harga',
        'sedia',
        'berat',
        'kategori_id',
        'img',
        'slug'

    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
