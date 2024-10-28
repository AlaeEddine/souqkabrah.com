<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_ar',
        'name_fr',
        'name_en',
        'code',
        'country_id',
    ];
    use HasFactory;
}
