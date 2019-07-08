<?php

namespace App\Http\Controllers\Backend;

use App\MOdels\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\Photography;

class PhotographyController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:photographies.create');
    }



    public function index()
    {
        $photos=Photography::orderBy('id', 'DESC')->get();
       return view('Backend.includes.photography.photography-manage', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.includes.photography.photography-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        if($request->hasFile('file'))
        {
            $imageFile = $request->file('file');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageDirectory='uploads/';
            $imageUrl=$imageDirectory.$imageName;
            $imageFile->move($imageDirectory, $imageName);

            Photography::create([
                'photography_image_path'=>$imageUrl,
            ]);
        }

        $this->setSuccess('Your photo is uploaded');
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
        //
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
    public function update(Request $request)
    {

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

    public function publishedPhoto($id){


        $photo=Photography::find($id);

        $photo->publication_status = 1 ;
        $photo->save();

        $this->setSuccess('Your Carousel Published successfully done');
        return redirect()->back();
    }
    public function unpublishedPhoto($id){

        $photo=Photography::find($id);

        $photo->publication_status =0;
        $photo->save();

        $this->setSuccess('Your Carousel Published successfully done');
        return redirect()->back();
    }

    public function deletePhoto($id){


        $photo = Photography::findOrFail($id);
        $image_path =$photo->photography_image_path;

        if (File::exists($image_path)) {
            File::delete($image_path);
//            unlink($image_path);
        }
        $photo->delete();


        $this->setSuccess('Your Carousel deleted successfully done !');
        return redirect()->back();
    }
}
