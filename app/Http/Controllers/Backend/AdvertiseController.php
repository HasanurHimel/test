<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdPosition;
use App\Models\Advertise;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertiseController extends Controller
{

    public function __construct()
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
=======

>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
        $this->middleware('can:advertise.create');
    }


    public function index()
    {
        $advertises=Advertise::orderBy('id', 'DESC')->with('adPosition')->get();


        return view('Backend.includes.advertise.manage-advertise', compact('advertises'));
    }


    public function create()
    {
        $positions=AdPosition::orderBy('position', 'DESC')->get();
        return view('Backend.includes.advertise.create-advertise', compact('positions'));
    }


    public function store(Request $request)
    {

        $advertise=Advertise::create([
            'ad_code'=>$request->input('ad_code'),
            'image_active'=>$request->input('image_active'),
            'ad_position_id'=>$request->input('ad_position_id'),
        ]);

        if ($request->file('image')){
            $advertise->addMedia($request->file('image'))->toMediaCollection('advertise');

        }



        $this->setSuccess('Your Advertise is Created');
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
        $positions=AdPosition::orderBy('position', 'DESC')->get();
        $advertise=Advertise::find($id);
        return view('Backend.includes.advertise.edit-advertise', compact('positions', 'advertise'));
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
//        return $request->all();
        $advertise=Advertise::find($id);
        $advertise->update([
            'ad_code'=>$request->input('ad_code'),
            'image_active'=>$request->input('image_active'),
            'ad_position_id'=>$request->input('ad_position_id'),
        ]);

        if ($request->hasFile('image')) {

            $existingImage = Media::where('model_id', $id)
                ->where('collection_name', 'advertise')
                ->first();

            $newFile = $request->file('image');
            if ($existingImage) {
                $existingImage->updateFile($newFile);
            } else {
                $advertise->addMedia($request->file('image'))->toMediaCollection('advertise');
            }


        }

        $this->setSuccess('Your Advertise is Updated');
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
        $advertise=Advertise::find($id);
        $advertise->delete();
        $this->setSuccess('Your advertise delete successfully');
        return redirect()->back();
    }
}
