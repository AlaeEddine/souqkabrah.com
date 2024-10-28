<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'id', 'id_from', 'name_from', 'email_from', 'phone_from', 'id_to', 'name_to', 'email_to', 'phone_to', 'id_category', 'title_category', 'id_subcategory', 'title_subcategory', 'id_subsubcategory', 'title_subsubcategory', 'id_ads', 'title_ads', 'removed', 'created_at', 'updated_at'
    ];
    use HasFactory;
}
