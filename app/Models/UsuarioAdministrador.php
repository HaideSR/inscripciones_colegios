<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioAdministrador extends Model
{
    use HasFactory;
    protected $table='usuario_administrador';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
