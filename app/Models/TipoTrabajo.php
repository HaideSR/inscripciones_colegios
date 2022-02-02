<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTrabajo extends Model
{
    use HasFactory;
    protected $table = 'tipo_trabajo';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
