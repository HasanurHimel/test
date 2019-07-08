<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Profile extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable=['admin_id','name', 'email', 'designation', 'experience', 'photo', 'publication_status'];

  public function admin(){

    return $this->belongsTo(Admin::class);

   }

}
