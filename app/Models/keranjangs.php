<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjangs extends Model
{
    use HasFactory;
    protected $table = 'keranjangs';
    protected $primaryKey = 'barangid';
    protected $fillable = [
        'kategori',
        'nama',
        'harga',
        'jumlah',
        'fileName',
    ];
}
