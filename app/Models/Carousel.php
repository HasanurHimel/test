<?php

namespace App\MOdels;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Carousel extends Model implements HasMedia

{
use HasMediaTrait;

protected $guarded=[];


}