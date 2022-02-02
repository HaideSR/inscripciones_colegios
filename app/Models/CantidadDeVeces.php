<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CantidadDeVeces extends Model
{
    use HasFactory;
    protected $table = 'cantidad_de_veces';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
