<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrecuenciaTrabajo extends Model
{
    use HasFactory;
    protected $table = 'frecuencia_trabajo';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
