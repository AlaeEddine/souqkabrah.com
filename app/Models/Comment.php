<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $fillable =[ 'id', 'id_from', 'name_from', 'email_from', 'phone_from', 'id_to', 'name_to', 'email_to', 'phone_to', 'id_ads', 'title_ads', 'id_category', 'id_subcategory', 'id_subsubcategory', 'comment', 'level', 'valide', 'banned', 'removed', 'created_at', 'updated_at' ];
    use HasFactory;
}
