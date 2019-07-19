<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\MOdels\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index(){

        $data=[];
        $data['carousels']=Carousel::where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->get();


        $data['main_sections']=Blog::where('publication_status', 1)
            ->where('blog_section_id',1 )
            ->orderBy('id', 'DESC')
            ->get();

        $data['left_sections']=Blog::where('publication_status', 1)
            ->where('blog_section_id',2 )
            ->orderBy('id', 'DESC')
            ->get();
        $data['right_sections']=Blog::where('publication_status', 1)
            ->where('blog_section_id',3 )
            ->orderBy('id', 'DESC')
            ->get();


        return view('Frontend.includes.homepage.homepage', $data);
    }




    public function article($slug){
        $article=Blog::where('slug', $slug)->first();
        return view('Frontend.includes.content.content', compact('article'));
    }

    public function admin(){
        return view('Backend.home');
    }
    public function category(){
        return view('Backend.admin.admin');
    }
}
