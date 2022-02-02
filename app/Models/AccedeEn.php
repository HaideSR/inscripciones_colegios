<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccedeEn extends Model
{
    use HasFactory;
    protected $table = 'accede_en';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
