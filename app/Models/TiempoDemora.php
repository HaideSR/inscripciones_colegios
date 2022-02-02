<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiempoDemora extends Model
{
    use HasFactory;
    protected $table = 'tiempo_demora';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
