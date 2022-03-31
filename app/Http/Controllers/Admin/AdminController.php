<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Hash;
use Rule;
use Image;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }
    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function index()
    {
        $id = Auth::user()->id;
        $users = Admin::where('id','!=', $id)->where('status', 1)->get();

        return view('admin.user.index', compact('users'));
    }
    public function add()
    {
        return view('admin.user.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|max:100|min:5',
            'lastname' => 'required|max:100|min:5',
            'email' => 'required|unique:admins|max:100',
            'password' => 'required|min:6',

      ],
      [
            'email.unique' =>"This email already used",
             'password.required' =>"Please enter your password",
             'password.min' =>"Please enter 6 or more characters. Leading or trailing spaces will be ignored.",
      ]
  );

         $user = new Admin;
         $user->firstname = $request->firstname;
         $user->lastname = $request->lastname;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->password = Hash::make($request->password);
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/user/'.$image_name);
            $user->image='public/uploads/user/'.$image_name;

            $user->save();
            $notification = array(
                      'messege'   =>  'User registration successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('users')->with($notification);
          }else {
            $user->save();
            $notification = array(
                      'messege'   =>  'User registration successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('users')->with($notification);
          }

    }
    public function edit($id)
    {
       $data = Admin::find($id);
       return view('admin.user.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
    'firstname' => 'required|max:100|min:5',
    'lastname' => 'required|max:100|min:5',
    'email' => ['required' , Rule::unique('admins')->ignore($id),'max:100',],
    'phone' => ['required' , Rule::unique('admins')->ignore($id),'max:19|min:9',],


],
[
    'email.unique' =>"This email already used",
     'password.required' =>"Please enter your password",
     'password.min' =>"Please enter 6 or more characters. Leading or trailing spaces will be ignored.",
]
);


    $user = Admin::findorfail($id);
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->password = Hash::make($request->password);

    $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/user/'.$image_name);
            unlink($user->image);
            $user->image='public/uploads/user/'.$image_name;
            $user->save();
            $notification = array(
                      'messege'   =>  'Updated user successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('users')->with($notification);
          }else {
            $user->save();
            $notification = array(
                      'messege'   =>  'Updated user successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('users')->with($notification);
          }


    }
    public function view($id)
    {
        $data = Admin::find($id);
        return view('admin.user.view', compact('data'));
    }
    public function softdelete(Request $request)
    {
        $user = Admin::find($request->modal_id);
        $user->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete user successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('users')->with($notification);
    }

    public function delete(Request $request)
    {
        $user = Admin::find($request->modal_id);
        unlink($user->image);
        $user->delete();
        $notification = array(
            'messege'   =>  'Delete user successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('users')->with($notification);
    }
    public function restore(Request $request)
    {
        $user = Admin::find($request->modal_id);
        $user->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore user successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('users')->with($notification);
    }
    public function logout()
    {
    Auth::logout();
        $notification=array(
            'messege'=>'Successfully Logout',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.login')->with($notification);
    }

}
