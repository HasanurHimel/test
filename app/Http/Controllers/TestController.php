<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){

        $content=Blog::find(2);
        return view('himel', compact('content'));
    }

}
