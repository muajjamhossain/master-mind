<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function roles()
    {
       $roles = Role::all();
       return view('admin.role.index',compact('roles'));

    }
    public function roleadd()
    {
       return view('admin.role.create');

    }
    public function roleinsert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role =$request->name;
        Role::create(['name' => $role]);
        $notification = array(
            'messege'   =>  'Role create successfully!',
                'alert-type'=>  'success'
             );
             return redirect()->route('roles')->with($notification);

    }
    public function edit($id)
    {
        $role = Role::find($id);

        // $role->givePermissionTo('index user');
       return view('admin.role.edit',compact('role'));

    }
    public function update(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id)->update(['name' => $request->name]);
        $notification = array(
            'messege'   =>  'Role Update successfully!',
                'alert-type'=>  'success'
             );
             return redirect()->back()->with($notification);

    }
    public function permissonupdate(Request $request)
    {
        $id = $request->id;
        $check = $request->check;
        $permission = $request->permission;
        if($check == 'true'){
            $role = Role::find($id);
            $role->givePermissionTo($permission);
            return response()->json(['success' => 'This role give this permission']);
        }elseif($check == 'false'){
            $role = Role::find($id);
            $role->revokePermissionTo($permission);
            return response()->json(['success' => 'This role remove this permission']);

        }

    }
}
