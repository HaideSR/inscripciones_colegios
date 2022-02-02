<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaCultura extends Model
{
    use HasFactory;
    protected $table = 'idioma_cultura';
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
}
