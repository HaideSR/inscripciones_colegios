<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesesLaboral extends Model
{
    use HasFactory;
    protected $table = "meses_laboral";
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
