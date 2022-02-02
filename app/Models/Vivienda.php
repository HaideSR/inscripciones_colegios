<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    use HasFactory;
    protected $table='vivienda';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
