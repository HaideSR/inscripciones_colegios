<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosTutor extends Model
{
    use HasFactory;
    protected $table = 'datos_tutores';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
