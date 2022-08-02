<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'price_order',
        'id_user',
        'id_status',
        'name',
        'email',
        'sdt',
        'address',
        'note',
    ];
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
}
