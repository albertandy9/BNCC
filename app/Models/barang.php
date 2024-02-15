<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'barangid';
    protected $fillable = [
        'kategori',
        'nama',
        'harga',
        'jumlah',
        'fileName',
    ];
}
