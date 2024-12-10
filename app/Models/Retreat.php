<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retreat extends Model
{
    protected $table = 'retreat';

    protected $fillable = [
        'name',
        'starting_date',
        'ending_date',
        'description',
        'price',
        'number_place',
        'address',
    ];

    public function CustomerRetreats(){
        
        return $this->hasMany(CustomerRetreat::class());
    }
    public function PictureRetreats(){
        
        return $this->hasMany(PictureRetreat::class());
    }
}
