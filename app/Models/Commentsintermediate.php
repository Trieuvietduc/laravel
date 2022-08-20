<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentsintermediate extends Model
{
    use HasFactory;
    protected  $table = 'comments_intermediate';
    protected $fillable = [
        'id_user',
        'id_product',
    ];
}
