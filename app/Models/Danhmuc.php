<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'id_danhmuc', 'id');
    }
}
