<?php

namespace App\Http\Controllers\Backend;

use App\Models\PermissionFor;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionForController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admins.create');
    }


    public function index()
    {
        $permissions_for=PermissionFor::all();
        return view('Backend.new-admin.permission.permission-for.permission-for-show', compact('permissions_for'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.new-admin.permission.permission-for.permission-for-create');
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
            'name'=>'required|min:2'

        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        PermissionFor::create($request->all());

        $this->setSuccess('your Permissions for created Successfully');

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
        $permission_for=PermissionFor::find($id);
        return view('Backend.new-admin.permission.permission-for.permission-for-edit', compact('permission_for'));

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
            'name'=>'required|min:2'

        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $permission_for=PermissionFor::find($id);

        $permission_for->update($request->all());

        $this->setSuccess('your Permissions for Updated Successfully');

        return redirect()->route('permission-for.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=PermissionFor::find($id)->delete();
        $this->setSuccess('Your permission for is deleted');
        return redirect()->route('permission-for.index');
    }
}
