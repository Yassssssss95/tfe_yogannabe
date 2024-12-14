<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'lastname',
        'firstname',
        'age',
        'message',
    ];

    public function User(){
        
        return $this->belongsto(User::class());
    }

    public function CustomerRetreats(){
        
        return $this->hasMany(CustomerRetreat::class());
    }
}
