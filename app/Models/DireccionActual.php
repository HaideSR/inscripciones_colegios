<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionActual extends Model
{
    use HasFactory;
    protected $table = 'direccion_actual';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
