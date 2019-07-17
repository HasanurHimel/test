<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdPosition;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Advertise extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable=['ad_code', 'image_active', 'ad_position_id'];

    public function adPosition(){
        return $this->belongsTo(AdPosition::class);
    }

}
