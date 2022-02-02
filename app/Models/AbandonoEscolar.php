<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbandonoEscolar extends Model
{
    use HasFactory;
    protected $table = 'abandono_escolar';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
