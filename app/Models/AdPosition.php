<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdPosition extends Model
{
    protected $fillable=['position'];

    public function advertises(){
        return $this->hasMany(AdPosition::class);
    }
}
