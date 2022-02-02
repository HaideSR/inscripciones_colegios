<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioBasico extends Model
{
    use HasFactory;
    protected $table = 'servicio_basico';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
