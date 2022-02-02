<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesoInternet extends Model
{
    use HasFactory;
    protected $table = 'acceso_internet';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
