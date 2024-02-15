<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    use HasFactory;
    protected $table = 'login';
    protected $primaryKey = 'userid';
    protected $fillable = [
        'username',
        'email',
        'password',
        'noHP',
    ];
}
