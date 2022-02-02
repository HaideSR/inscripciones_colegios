<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretario extends Model
{
    use HasFactory;
    protected $table = 'secretario';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
