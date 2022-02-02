<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosEstudiante extends Model
{
    use HasFactory;
    protected $table = 'datos_estudiante';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
