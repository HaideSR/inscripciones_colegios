<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViveCon extends Model
{
    use HasFactory;
    protected $table = 'vive_con';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
