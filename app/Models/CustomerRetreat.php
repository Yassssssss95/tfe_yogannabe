<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerRetreat extends Model
{
    public function Customer(){
        
        return $this->belongsToMany(Customer::class('retreat_id'))
    }
    public function Retreat(){
        
        return $this->belongsToMany(Retreat::class('customers_id'))
    }
}
