<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detaiorder extends Model
{
    use HasFactory;
    protected $table = 'detai_order';
    protected $fillable = [
        'id_product',
        'so_luong_product',
        'name_product',
        'price_order',
        'id_user'
    ];
}
