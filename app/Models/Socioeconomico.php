<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socioeconomico extends Model
{
    use HasFactory;
    protected $table = 'socioeconomico';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
