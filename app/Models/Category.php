<?php

namespace App\Models;

use App\Events\CreateEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable=['category_name', 'slug', 'category_description', 'publication_status'];

public function subCategories(){
    return $this->hasMany(SubCategory::class);
}

public function blogs(){
    return $this->hasMany(Blog::class);
}

    protected $dispatchesEvents = [
        'created' => CreateEvent::class,
        'updated' => UpdateEvent::class,
        'deleted' => DeleteEvent::class,
    ];

}
