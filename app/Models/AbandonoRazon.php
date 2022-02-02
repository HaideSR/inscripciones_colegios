<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbandonoRazon extends Model
{
    use HasFactory;
    protected $table = 'abandono_razon';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
