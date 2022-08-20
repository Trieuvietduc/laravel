<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
     'name',
     'don_gia',
     'so_luong',
     'avatar_product',
     'mo_ta',
     'khuyen_mai',
     'id_danhmuc',
     'kich_thuoc'
    ];
    public function danhmuc(){
        return $this->belongsTo(Danhmuc::class,'id_danhmuc','id');
    }
    public function sizes(){
        return $this->belongsTo(Product::class,'id_kichthuoc','id');
    }
}
