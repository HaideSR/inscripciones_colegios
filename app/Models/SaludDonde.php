<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaludDonde extends Model
{
    use HasFactory;
    protected $table = 'salud_donde';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
