<?php

namespace App\Http\Controllers\Backend;

use App\Models\Notice;
use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Matcher\Not;

class NoticeController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:notice.create');
    }

    public function index()
    {
        //
    }


    public function create()
    {
        return view('Backend.includes.notice.create-notice');
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
            'notice' =>'required|min:5|max:400',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Notice::create([
            'notice'=>$request->input('notice'),
        ]);

        $this->setSuccess('Your Notice is updated');
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
        $notice=Notice::find(1);
        return view('Backend.includes.notice.manage-notice', compact('notice'));
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
            'notice' =>'required|min:5|max:400',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $notice=Notice::find(1);
        $notice->update([
            'notice'=>$request->input('notice'),
        ]);

        $this->setSuccess('Your Notice is updated');
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
