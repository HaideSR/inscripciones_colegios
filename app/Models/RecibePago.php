<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecibePago extends Model
{
    use HasFactory;
    protected $table = 'recibe_pago';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
