<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable =[
        'id', 'id_from', 'name_from', 'email_from', 'phone_from', 'id_to', 'name_to', 'email_to', 'phone_to', 'rating_name', 'rating_value', 'buyed', 'removed', 'created_at', 'updated_at'
    ];
    use HasFactory;
}
