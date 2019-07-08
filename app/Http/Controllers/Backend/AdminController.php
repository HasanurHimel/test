<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\Role;
use function Aws\recursive_dir_iterator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admins.create');
    }


    public function index()
    {

        $admins=Admin::with('roles')->get();
        return view('Backend.new-admin.admin.admin-show', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('Backend.new-admin.admin.admin-create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles=Role::orderBy('name', 'ASC')->get();
        $admin=Admin::with('roles')->find($id);
        return view('Backend.new-admin.admin.admin-edit', compact('admin', 'roles'));
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

        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required','min:8', 'max:15'],
            'status' => ['required'],
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin=Admin::find($id);

        $admin->update($request->all());
        $admin->roles()->sync($request->role);

        $this->setSuccess('Admin data Upadated successfully');
        return redirect()->route('admin.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::where('id', $id);
        $admin->delete();

        $this->setSuccess('Admin Is Deleted');
        return redirect()->back();
    }



    public function activeAdmin($id){

        $admin=Admin::find($id);
        $admin->status = 1;
        $admin->save();
        $this->setSuccess('Admin is Activated');
        return redirect()->back();
    }

    public function deactiveAdmin($id){
        $admin=Admin::find($id);
        $admin->status = 0;
        $admin->save();
        $this->setSuccess('Admin is DeActivated');
        return redirect()->back();
    }
}
