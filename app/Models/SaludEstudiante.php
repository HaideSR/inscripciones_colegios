<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaludEstudiante extends Model
{
    use HasFactory;
    protected $table = 'salud_estudiante';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
