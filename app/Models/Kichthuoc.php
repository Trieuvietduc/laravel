<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kichthuoc extends Model
{
    use HasFactory;
    protected $table = 'kichthuoc';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'id_product',
    ];
}
