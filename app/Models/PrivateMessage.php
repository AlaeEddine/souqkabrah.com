<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $fillable = [
        'id', 'id_from', 'name_from', 'phone_from', 'email_from', 'id_to', 'name_to', 'phone_to', 'email_to', 'message', 'removed_by_from', 'removed_by_to', 'vu', 'removed', 'created_at', 'updated_at'
    ];
    use HasFactory;


    public function sender(){
        return $this->belongsTo(User::class,'id_from');
    }
    public function reciever(){
        return $this->belongsTo(User::class,'id_to');
    }
}
