<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $table = 'favourite';
    protected $fillable = [
        'id',
        'id_user',
        'id_product',
        'name',
        'don_gia',
        'so_luong',
        'avatar_product',
        'mo_ta',
        'khuyen_mai',
        'id_danhmuc',
        'kich_thuoc'
       ];
}
