<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoDiscapacidad extends Model
{
    use HasFactory;
    protected $table = 'grado_discapacidad';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
