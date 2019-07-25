<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\MOdels\Carousel;
use App\Models\Media;
use App\Models\Photography;
use Cache;
use Session;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\Return_;

class HomeController extends Controller
{

    public function index(){
//
//$data=Cache::get('media');
//dd($data);
//        dd(session()->get('media', function (){ Media::all(); }));
//        dd(cache()->get('media'));

        $data=[];
        $data['carousels']=cache()->get('carousels', function (){
            Carousel::where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        });

        $data['blogs']=cache()->get('blogs', function (){
            Blog::where('publication_status', 1)
                ->select('id', 'category_id', 'blog_title', 'slug', 'blog_short_description', 'author_name', 'thumbnail','blog_section_id', 'publication_status', 'created_at')
                ->orderBy('id', 'DESC')
                ->get();
        });

        $data['photographies']=cache()->get('photographies', function () {
            Photography::orderBy('id', 'DESC')
                ->get();
        })->take(6);

        $data['popular_posts']=cache()->get('blogs')->sortByDesc('view_count')->take(5);

        return view('Frontend.includes.homepage.homepage', $data);
    }

    public function article($slug){
        $data=[];

        $data['article']=cache()->get('blogs')->where('slug', $slug)->first();
//
        $blog_id='blog_'.$data['article']->id;

          if (!session()->has($blog_id)){
              $data['article']->increment('view_count');
              session()->put($blog_id, 1);
              session()->save();
          }

        $data['related_posts']=cache()
            ->get('blogs')
            ->where('category_id', $data['article']->category_id);
            return view('Frontend.includes.content.content', $data);
    }

    public function admin(){
        return view('Backend.home');
    }
    public function category(){
        return view('Backend.admin.admin');
    }
}
