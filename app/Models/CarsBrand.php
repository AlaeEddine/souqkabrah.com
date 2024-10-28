<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsBrand extends Model
{
    public $timestamps = true;
    protected $table = 'cars_brand';
    use HasFactory;
}
