<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedioTransporte extends Model
{
    use HasFactory;
    protected $table = 'medio_transporte';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
