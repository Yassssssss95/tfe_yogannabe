<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retreat extends Model
{
    protected $fillable = [
        'name',
        'starting_date',
        'ending_date',
        'description',
        'price',
        'number_place',
        'address',
    ];
}
