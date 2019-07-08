<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['category_name', 'slug', 'category_description', 'publication_status'];

public function subCategory(){
    return $this->hasMany(SubCategory::class);
}

public function blogs(){
    return $this->hasMany(Blog::class);
}

}
