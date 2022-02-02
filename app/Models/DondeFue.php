<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DondeFue extends Model
{
    use HasFactory;
    protected $table = 'donde_fue';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
