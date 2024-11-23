<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PictureRetreat extends Model
{
    protected $fillable = [
        'path',
        
    ];
    public function Retreat(){
        
        return $this->belongsTo(Retreat::class('retreat_id'))
    }
}
