<?php

namespace App\Http\Controllers\Backend;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Models\AdPosition;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\PostInc;

class AdPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions=AdPosition::orderBy('position', 'DESC')->get();
        return view('Backend.includes.advertise.ad-position.adPosition-manage', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.includes.advertise.ad-position.adPosition-create');
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
            'position' =>'required|min:2|max:400',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        AdPosition::create([
            'position'=>$request->input('position'),
        ]);

        $this->setSuccess('Your Ad Position is Created');
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
        $position=AdPosition::find($id);
        return view('Backend.includes.advertise.ad-position.adPosition-edit', compact('position'));
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
            'position' =>'required|min:2|max:400',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $position=AdPosition::find($id);
        $position->update([
            'position'=>$request->input('position'),
        ]);

        $this->setSuccess('Your Ad Position is updated');
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
        $position=AdPosition::find($id);
        $position->delete();

        $this->setSuccess('Your ad position name deleted');
        return redirect()->back();
    }
}
