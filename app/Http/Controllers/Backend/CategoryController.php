<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:categories.create');
    }




    public function index()
    {


        $categories=Category::orderBy('id', 'DESC')->get();


        return view('Backend.includes.category.category-manage', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.includes.category.category-create');

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
            'category_name' =>'required|min:3|max:50|unique:categories',
            'category_description' =>'required|min:3|max:150',
            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

        }catch (\Exception $e){
            $this->setWarning('create error');
        }

        $category =Category::create([
            'category_name'=>trim($request->input('category_name')),
            'slug'=>str_slug($request->input('category_name')),
            'category_description'=>trim($request->input('category_description')),
            'publication_status'=>$request->input('publication_status'),
        ]);

        $this->setSuccess('Your category created successfully done ');
        return redirect()->back();




    }

    public function publishedCategory($id){


        $category=Category::find($id);

        $category->publication_status = 1 ;
        $category->save();

        $this->setSuccess('Your category Published successfully done');
        return redirect()->back();
    }
    public function unpublishedCategory($id){

        $category=Category::find($id);

        $category->publication_status =0;
        $category->save();

        $this->setSuccess('Your category Published successfully done');
        return redirect()->back();
    }


    public function show($id)
    {
        $category=Category::find($id);
        return view('Backend.includes.category.category-edit', compact('category'));
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
            'subcategory_name' =>'required|min:3|max:50|unique:categories',
            'subcategory_description' =>'required|min:3|max:150',
            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{


            $category=Category::find($id);
            $category->update([
                'category_name'=>trim($request->input('category_name')),
                'slug'=>str_slug($request->input('category_name')),
                'category_description'=>trim($request->input('category_description')),
                'publication_status'=>$request->input('publication_status'),
            ]);

        }catch (\Exception $e){
            $this->setWarning('It has some error');
        }

        $this->setSuccess('Your category update is successfully done !');
        return redirect()->route('category.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function deleteCategory($id){
        $category=Category::find($id);

        $category->delete();
        $this->setSuccess('Your category deleted successfully done !');
        return redirect()->back();
    }

}
