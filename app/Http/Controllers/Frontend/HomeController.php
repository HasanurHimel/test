<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\MOdels\Carousel;
use App\Models\Category;
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



//
//    protected function blog_data(){
//        $data=[];
//
//        return $data;
//    }

    public function index(){


        $data=[];


        $data['main_sections_big_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 1)
            ->where('publication_status', 1)
            ->where('thumbnail', 1)
            ->take(1);

        $data['main_sections_small_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 1)
            ->where('publication_status', 1)
            ->where('thumbnail', 0)
            ->take(4);

        $data['left_sections_big_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 2)
            ->where('publication_status', 1)
            ->where('thumbnail', 1)
            ->take(1);

        $data['left_sections_small_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 2)
            ->where('publication_status', 1)
            ->where('thumbnail', 0)
            ->take(4);

        $data['right_sections_big_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 3)
            ->where('publication_status', 1)
            ->where('thumbnail', 1)
            ->take(1);

        $data['right_sections_small_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 3)
            ->where('publication_status', 1)
            ->where('thumbnail', 0)
            ->take(4);

        $data['bottom_sections_big_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 4)
            ->where('publication_status', 1)
            ->where('thumbnail', 1)
            ->take(1);

        $data['bottom_sections_small_div']=cache()
            ->get('blogs')
            ->where('blog_section_id', 4)
            ->where('publication_status', 1)
            ->where('thumbnail', 0)
            ->take(4);



        $data['carousels']=cache()->get('carousels', function (){
            Carousel::where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        });

        $data['latest_posts']=cache()->get('blogs')->where('publication_status', 1)->take(5);

//        dd($this->blog_data());
        $data['photographies']=cache()->get('photographies', function () {
            Photography::orderBy('id', 'DESC')
                ->get();
        })->take(6);

        $data['popular_posts']=cache()->get('blogs')->where('publication_status', 1)->sortByDesc('view_count')->take(5);

        return view('Frontend.includes.homepage.homepage', $data);
    }

    public function article($slug){
        $data=[];

        $data['article']=cache()->get('blogs')->where('slug', $slug)->where('publication_status', 1)->first();
//
        $blog_id='blog_'.$data['article']->id;

          if (!session()->has($blog_id)){
              $data['article']->increment('view_count');
              session()->put($blog_id, 1);
              session()->save();
          }

        $data['related_posts']=cache()
            ->get('blogs')
            ->where('publication_status', 1)
            ->where('category_id', $data['article']->category_id)
            ->take(5);

            return view('Frontend.includes.content.content', $data);
    }

    public function admin(){
        return view('Backend.home');
    }
    public function category(){
        return view('Backend.admin.admin');
    }

    public function category_posts($slug){

        $category_posts=Category::with('blogs')->where('slug', $slug)->first();

        return view('Frontend.includes.category-posts.category-posts', compact('category_posts'));

    }
//    public function sub_category_posts($slug){
//
//        return $slug;
//    }





}
