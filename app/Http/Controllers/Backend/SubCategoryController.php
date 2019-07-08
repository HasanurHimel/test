<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:sub_categories.create');
    }


    public function index()
    {
        $subCategories=SubCategory::with('category')->orderBy('id', 'DESC')->get();


        return view('Backend.includes.sub-category.sub-category-manage', compact('subCategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('publication_status', 1)
            ->orderBy('category_name', 'ASC')
            ->get();
        return view('Backend.includes.sub-category.sub-category-create', compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'subcategory_name' => 'required|min:3|max:50|unique:sub_categories',
            'category_id' => 'required',
            'subcategory_description' => 'required|min:3|max:150',
            'publication_status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

        }catch (\Exception $e){
            $this->setWarning('create error');
        }

            SubCategory::create([
            'category_id'=>$request->input('category_id'),
            'subcategory_name'=>trim($request->input('subcategory_name')),
            'slug'=>str_slug($request->input('subcategory_name')),
            'subcategory_description'=>trim($request->input('subcategory_description')),
            'publication_status'=>$request->input('publication_status'),
        ]);

        $this->setSuccess('Your Sub-category created successfully done ');
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
        $data=[];
        $data['categories']=Category::where('publication_status', 1)
            ->orderBy('category_name', 'ASC')
            ->get();
        $data['subCategory']=SubCategory::find($id);

        return view('Backend.includes.sub-category.sub-category-edit', $data);

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
        $validator = \Validator::make($request->all(), [
            'subcategory_name' => 'required|min:3|max:50',
            'category_id' => 'required',
            'subcategory_description' => 'required|min:3|max:150',
            'publication_status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{


            $subcategory=SubCategory::find($id);
            $subcategory->update([
                'category_id'=>$request->input('category_id'),
                'subcategory_name'=>trim($request->input('subcategory_name')),
                'slug'=>str_slug($request->input('subcategory_name')),
                'subcategory_description'=>trim($request->input('subcategory_description')),
                'publication_status'=>$request->input('publication_status'),
            ]);

        }catch (\Exception $e){
            $this->setWarning('It has some error');
        }

        $this->setSuccess('Your sub-category update is successfully done !');
        return redirect()->route('subCategory.index');




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

    public function publishedSubCategory($id){


        $subCategory=SubCategory::find($id);

        $subCategory->publication_status = 1 ;
        $subCategory->save();

        $this->setSuccess('Your sub-category Published successfully done');
        return redirect()->back();
    }
    public function unpublishedSubCategory($id){

        $subCategory=SubCategory::find($id);

        $subCategory->publication_status =0;
        $subCategory->save();

        $this->setSuccess('Your sub-category Published successfully done');
        return redirect()->back();
    }

    public function deleteSubCategory($id){
        $subCategory=SubCategory::find($id);

        $subCategory->delete();
        $this->setSuccess('Your sub-category deleted successfully done !');
        return redirect()->back();
    }


}
