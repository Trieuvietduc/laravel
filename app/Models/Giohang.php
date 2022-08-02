<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
    use HasFactory;
    protected $table = 'giohang';
    // public $timestamps = false;
    protected $fillable = [
        'product_name',
        'id_user',
        'id_product',
        'avatar_product',
        'so_luong',
        'gia'
    ];
}
