<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    protected $fillable=['category_id', 'subcategory_name', 'slug', 'subcategory_description', 'publication_status'];

        public function category(){
            return $this->belongsTo(Category::class);
        }
        public function blogs(){
            return $this->hasMany(Blog::class);
        }


}
