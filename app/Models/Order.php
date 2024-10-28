<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 'id_owner', 'name_owner', 'id_store', 'plan1', 'plan2', 'plan3', 'plan4', 'plan5', 'plan6', 'plan7', 'plan8', 'plan9', 'plan10', 'plan11', 'totalprice', 'created_at', 'updated_at', 'status', 'removed'
    ];
    use HasFactory;
}
