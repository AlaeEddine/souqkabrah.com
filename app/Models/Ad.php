<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $timestamps = true;
    protected $fillable =[
        'id', 'title', 'id_owner', 'name_owner', 'id_store', 'id_category', 'name_category', 'id_subcategory', 'name_subcategory', 'id_subsubcategory', 'name_subsubcategory', 'id_country', 'name_country', 'id_city', 'name_city','id_village', 'name_village', 'id_currency', 'name_currency', 'id_type', 'name_type', 'fixed', 'id_contact', 'name_contact', 'price', 'mazad', 'valide', 'allow_comments', 'details', 'tags', 'cover', 'picture1', 'picture2', 'picture3', 'picture4', 'picture5', 'picture6', 'picture7', 'picture8', 'picture9', 'picture10', 'nbr_vu', 'status', 'banned', 'removed', 'created_at', 'updated_at'
    ];

    use HasFactory;
}
