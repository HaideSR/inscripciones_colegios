<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrColegio extends Model
{
    use HasFactory;
    protected $table = 'ir_colegio';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
