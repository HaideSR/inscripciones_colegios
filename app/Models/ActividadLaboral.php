<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadLaboral extends Model
{
    use HasFactory;
    protected $table = 'actividad_laboral';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
