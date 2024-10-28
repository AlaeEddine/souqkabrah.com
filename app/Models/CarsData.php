<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsData extends Model
{
    public $timestamps = true;
    protected $table = 'cars_data';
    protected $fillable = [
        'id', 'id_ads', 'new_or_not', 'id_brand', 'name_brand', 'model', 'submodel', 'year', 'bodywork', 'km', 'chairs_number', 'gazoil_or_not', 'manual_or_automatic', 'motor_cc', 'battery_size', 'battery_life', 'color_external', 'color_internal', 'details_external', 'details_internal', 'technical_details', 'geo_details', 'brand_country', 'license', 'insurance', 'customs', 'chassis_condition', 'painting', 'payment_method', 'ad_type', 'rental_period', 'created_at', 'updated_at'
    ];
    use HasFactory;
}
