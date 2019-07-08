<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('Frontend.includes.homepage.homepage');
    }//

    public function detail(){
        return view('Frontend.includes.content.content');
    }

    public function admin(){
        return view('Backend.home');
    }
    public function category(){
        return view('Backend.admin.admin');
    }
}
