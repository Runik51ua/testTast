<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    protected $fillable = ['Name', 'Price', 'Bedrooms', 'Bathrooms', 'Storeys', 'Garages'];
}
