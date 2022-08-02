<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = [
        'id',
        'name',
    ];
    public function order(){
        return $this->hasMany(Donhang::class,'id_status','id');
    }
}
