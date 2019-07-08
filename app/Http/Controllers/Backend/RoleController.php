<?php

namespace App\Http\Controllers\Backend;

use App\Models\Permission;
use App\Models\PermissionFor;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Tags\Author;


class RoleController extends Controller
{

    public function __construct()
    {
     $this->middleware('can:admins.create');

    }



    public function index()
    {
        $roles=Role::with('permissions')->get();
//        dd($roles);
        return view('Backend.new-admin.role.role-show', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions_for=PermissionFor::with('permissions')->orderBy('name', 'ASC')->get();

//        dd($permission_for);


        return view('Backend.new-admin.role.role-create', compact('permissions_for'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $prole=Permission::all();
//        dd($prole);
//        return $prole;

//        return $request->all();
       $validator=\Validator::make($request->all(), [
           'name'=>'required|min:2'

       ]);
       if ($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }


        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);

//        it cannot be work ......dond't use below system

//           $role=Role::create([
//               'name'=>$request->name,
//           ]);
//           $role->permissions->sync($request->permission);

       $this->setSuccess('your Role created Successfully');

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
        $data['permissions_for']=PermissionFor::with('permissions')->orderBy('name', 'ASC')->get();
        $data['role']=Role::where('id', $id)->with('permissions')->first();

        return view('Backend.new-admin.role.role-edit', $data);
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

//        $role=Role::find($id);
//        $role->update($request->all());


        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        $this->setSuccess('your Role Updated Successfully');

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::find($id)->delete();
        $this->setSuccess('Your role is deleted');
        return redirect()->route('role.index');
    }
}
