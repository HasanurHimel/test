<?php

namespace App\Models;

use App\Events\CreateEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Photography extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $guarded=[];

    protected $dispatchesEvents = [
        'created' => CreateEvent::class,
        'updated' => UpdateEvent::class,
        'deleted' => DeleteEvent::class,
    ];



}
