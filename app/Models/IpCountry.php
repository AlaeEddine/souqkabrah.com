<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpCountry extends Model
{

    protected $table='ip_countries';
    protected $fillable =[
        'id','ip_start','ip_end','code_country','removed',
    ];
    use HasFactory;
}
