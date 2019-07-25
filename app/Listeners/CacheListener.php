<?php

namespace App\Listeners;

use App\Models\Blog;
use App\MOdels\Carousel;
use App\Models\Category;
use App\Models\Media;
use App\Models\Photography;
use App\Models\SubCategory;
use Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class CacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        Cache::forget('blogs');
        Cache::forget('media');
        Cache::forget('categories');
        Cache::forget('carousels');
        Cache::forget('photographies');

//        $data=[];
        $media=\Spatie\MediaLibrary\Models\Media::all();
        $blogs=Blog::with('category')
            ->where('publication_status', 1)
            ->select('id', 'category_id', 'blog_title', 'slug', 'blog_short_description', 'blog_long_description','author_name', 'thumbnail', 'blog_section_id', 'publication_status', 'created_at', 'view_count')
            ->orderBy('id', 'DESC')
            ->get();;

        $categories=Category::with('subCategories')->orderBy('id', 'DESC')->take(6)->get();

        $carousels=Carousel::where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->get();

        $photographies=Photography::orderBy('id', 'DESC')
            ->take(6)
            ->get();


//        Cache::forever('media', $media);
        Cache::forever('blogs', $blogs);
        Cache::forever('categories', $categories);
        Cache::forever('carousels', $carousels);
        Cache::forever('photographies', $photographies);
    }
}
