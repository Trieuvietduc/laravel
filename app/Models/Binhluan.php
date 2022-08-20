<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    use HasFactory;
    protected $table = 'binhluan';
    
    protected $fillable = [
        'noidung',
        'id_user',
        'id_product',
        'likes',
        'dislike',
    ];
    public function users(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
