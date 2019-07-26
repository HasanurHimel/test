<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\BlogSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogSectionController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:blog-section.create');
    }
    public function index()
    {
        $blogSections=BlogSection::orderBy('id', 'DESC')->get();
        return view('Backend.includes.blog.blog-section.section-manage', compact('blogSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.includes.blog.blog-section.section-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator=\Validator::make($request->all(), [
          'name' =>'required|min:2|max:60'
       ]);
       if ($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }

       BlogSection::create([
          'name'=>$request->input('name'),
       ]);
       $this->setSuccess('Your blog Section created successfully');
       return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogSection=BlogSection::find($id);
        return view('Backend.includes.blog.blog-section.section-edit', compact('blogSection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=\Validator::make($request->all(), [
            'name' =>'required|min:2|max:60'
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blogSection=BlogSection::find($id);
        $blogSection->update([
            'name'=>$request->input('name'),
        ]);
        $this->setSuccess('Your blog Section updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $blogSection=BlogSection::find($id);
        $blogSection->delete();

        $this->setSuccess('your blog section deleted');

        return redirect()->back();
    }
}
