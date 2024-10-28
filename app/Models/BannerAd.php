<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerAd extends Model
{
    public $timestamps = true;
    protected $table ='banners';
    protected $fillable =[
        'id', 'id_from', 'name_from', 'phone_from', 'whatsapp_from', 'email_from', 'position', 'title', 'description', 'picture1', 'picture2', 'picture3', 'picture4', 'picture5', 'picture6', 'picture7', 'picture8', 'picture9', 'picture10', 'date_start', 'date_end', 'valide', 'removed', 'created_at', 'updated_at'
    ];

    use HasFactory;
}
