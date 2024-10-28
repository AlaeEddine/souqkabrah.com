<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'id', 'name', 'enabled', 'removed', 'created_at', 'updated_at'
    ];
    use HasFactory;
}
