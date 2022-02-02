<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidaEducativa extends Model
{
    use HasFactory;
    protected $table = 'datos_ue';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
