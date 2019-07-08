<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MOdels\Carousel;

class CarouselController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:carousels.create');
    }



    public function index()
    {
        $carousels=Carousel::orderBy('id', 'DESC')->get();
        return view('Backend.includes.carousel.carousel-manage', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.includes.carousel.carousel-create');
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
            'carousel_caption' =>'required|min:3|max:120|unique:carousels',
            'carousel_image' =>'required',
            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

        }catch (\Exception $e){
            $this->setWarning('create error');
        }

        $carousel =Carousel::create([
            'carousel_caption'=>trim($request->input('carousel_caption')),
            'publication_status'=>$request->input('publication_status'),
        ]);
        $carousel->addMedia($request->file('carousel_image'))->toMediaCollection('carousel');



        $this->setSuccess('Your Carousel created successfully done ');
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
        $carousel=Carousel::find($id);

        return view('Backend.includes.carousel.carousel-edit', compact('carousel'));

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
            'carousel_caption' =>'required|min:3|max:120',
            'carousel_image' =>'required',
            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

        }catch (\Exception $e){
            $this->setWarning('create error');
        }

        $carousel =Carousel::find($id);
        $carousel->update([
            'carousel_caption'=>trim($request->input('carousel_caption')),
            'publication_status'=>$request->input('publication_status'),
        ]);

        if ($request->file('carousel_image')){

            $existingImage=Media::where('model_id', $id)
                ->where('collection_name', 'carousel')
                ->first();
            $newFile = $request->file('carousel_image');
            $existingImage->updateFile($newFile);
        }


        $this->setSuccess('Your Carousel Updated successfully done ');
        return redirect()->route('carousel.index');


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


    public function publishedCarousel($id){


        $carousel=Carousel::find($id);

        $carousel->publication_status = 1 ;
        $carousel->save();

        $this->setSuccess('Your Carousel Published successfully done');
        return redirect()->back();
    }
    public function unpublishedCarousel($id){

        $carousel=Carousel::find($id);

        $carousel->publication_status =0;
        $carousel->save();

        $this->setSuccess('Your Carousel Published successfully done');
        return redirect()->back();
    }

    public function deleteCarousel($id){
        $carousel=Carousel::find($id);

        $carousel->delete();
        $this->setSuccess('Your Carousel deleted successfully done !');
        return redirect()->back();
    }

}
