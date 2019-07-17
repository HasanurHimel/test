<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable=['web_title', 'web_admin', 'meta_tag', 'meta_description'];
}
