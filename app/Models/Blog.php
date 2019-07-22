<?php

namespace App\Models;

use App\Events\CreateEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Notifications\Notifiable;

class Blog extends Model implements HasMedia
{
    use HasMediaTrait, Notifiable;


    protected $dispatchesEvents = [
        'created' => CreateEvent::class,
        'updated' => UpdateEvent::class,
        'deleted' => DeleteEvent::class,
    ];


//    protected $fillable=['blog_section'];
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function blogSection(){
        return $this->belongsTo(BlogSection::class);
    }




}
