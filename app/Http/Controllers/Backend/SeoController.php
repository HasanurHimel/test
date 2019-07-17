<?php

namespace App\Http\Controllers\Backend;

use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.includes.seo.create-seo');
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
          'web_title' =>'required|min:5|max:100',
          'web_admin' =>'required|min:2|max:100',
          'meta_tag' =>'required|min:2|max:200',
          'meta_description' =>'required|min:2|max:500',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Seo::create([
           'web_title'=>$request->input('web_title'),
           'web_admin'=>$request->input('web_admin'),
           'meta_tag'=>$request->input('meta_tag'),
           'meta_description'=>$request->input('meta_description'),
        ]);

        $this->setSuccess('Your Seo builder is updated');
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
        $seo=Seo::find(1);
        return view('Backend.includes.seo.build-seo', compact('seo'));
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
            'web_title' =>'required|min:5|max:100',
            'web_admin' =>'required|min:2|max:100',
            'meta_tag' =>'required|min:2|max:200',
            'meta_description' =>'required|min:2|max:500',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $seo=Seo::find(1);
        $seo->update([
            'web_title'=>$request->input('web_title'),
            'web_admin'=>$request->input('web_admin'),
            'meta_tag'=>$request->input('meta_tag'),
            'meta_description'=>$request->input('meta_description'),
        ]);

        $this->setSuccess('Your Seo builder is updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
