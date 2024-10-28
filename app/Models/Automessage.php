<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automessage extends Model
{
    protected $fillables = ['id', 'message_1', 'message_2', 'removed'];
    use HasFactory;
}
