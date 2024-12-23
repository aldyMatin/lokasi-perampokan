<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    //
    protected $fillable = ['location_name', 'latitude', 'longitude', 'region_name', 'description'];

}
