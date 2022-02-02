<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazonesAbandono extends Model
{
    use HasFactory;
    protected $table = 'razon_abandono';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
