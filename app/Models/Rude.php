<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rude extends Model
{
    use HasFactory;
    protected $table = 'rude';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
