<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarnetIdentidad extends Model
{
    use HasFactory;
    protected $fillable = [
        'id'
    ];
    protected $table = 'carnet_identidad';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
