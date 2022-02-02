<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesoAccede extends Model
{
    use HasFactory;
    protected $table = 'acceso_accede';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
