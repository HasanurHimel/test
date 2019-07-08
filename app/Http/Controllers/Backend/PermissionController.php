<?php

namespace App\Http\Controllers\Backend;

use App\Models\Permission;
use App\Models\PermissionFor;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admins.create');
    }





    public function index()
    {

        $permissions=Permission::with('permission_for')->orderBy('name', 'ASC')->get();

        return view('Backend.new-admin.permission.permission-show', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions_for=PermissionFor::orderBy('name', 'ASC')->get();
        return view('Backend.new-admin.permission.permission-create', compact('permissions_for'));
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
            'name'=>'required|min:2|max:50',
            'permission_for_id'=>'required'
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Permission::create($request->all());

        $this->setSuccess('Permission created successfully done');
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
        $permissions_for=PermissionFor::all();
        $permission=Permission::find($id);
        return view('Backend.new-admin.permission.permission-edit', compact('permission', 'permissions_for'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission=Permission::find($id);
        return view('Backend.new-admin.permission.permission-edit', compact('permission'));
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
            'name'=>'required|min:2|max:50',
            'permission_for_id'=>'required'
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $permission=Permission::find($id);
        $permission->update($request->all());

        $this->setSuccess('Permission Updated successfully done');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission=Permission::find($id)->delete();
        $this->setSuccess('Permission deleted successfully done');
        return redirect()->route('permission.index');
    }
}
