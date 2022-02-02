<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NacionPueblo extends Model
{
    use HasFactory;
    protected $table = 'nacion_pueblo';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
