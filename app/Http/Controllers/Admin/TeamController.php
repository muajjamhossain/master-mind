<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Team;
use Illuminate\Http\Request;
use Image;
use Auth;
use Str;
use Rule;

class TeamController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = Team::where('status', 1)->get();

        return view('admin.team.index', compact('all'));
    }
    public function add()
    {
        return view('admin.team.create');
    }
    public function insert(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'details' => 'required',

      ]);

         $team = new Team;
         $team->name = $request->name;
         $team->designation = $request->designation;
         $team->details = $request->details;
         $team->facebook = $request->facebook;
         $team->twitter = $request->twitter;
         $team->linkedin = $request->linkedin;
         $team->pinterest = $request->pinterest;
         $team->google = $request->google;
         $team->youtube = $request->youtube;
         $team->slug = Str::slug($request->name);
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/team/'.$image_name);
            $team->image='public/uploads/team/'.$image_name;

            $team->save();
            $notification = array(
                      'messege'   =>  'Team create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('teams')->with($notification);
          }else {
            $team->save();
            $notification = array(
                      'messege'   =>  'Team create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('teams')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = Team::find($id);
       return view('admin.team.edit', compact('data'));
    }
    public function update(Request $request)
    {

        $id = $request->id;
    $validatedData = $request->validate([
        'name' => 'required',
        'designation' => 'required',
        'details' => 'required',

    ]);
    $team =Team::find($id);
    $team->name = $request->name;
    $team->designation = $request->designation;
    $team->details = $request->details;
    $team->facebook = $request->facebook;
    $team->twitter = $request->twitter;
    $team->linkedin = $request->linkedin;
    $team->pinterest = $request->pinterest;
    $team->google = $request->google;
    $team->youtube = $request->youtube;
    $team->slug = Str::slug($request->name);
    $image = $request->image;
    if ($image) {
    $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('public/uploads/team/'.$image_name);
    $team->image='public/uploads/team/'.$image_name;

    $team->save();
    $notification = array(
                'messege'   =>  'Team create successfully',
                    'alert-type'=>  'success'
                );
                return redirect()->route('teams')->with($notification);
    }else {
    $team->save();
    $notification = array(
                'messege'   =>  'Team create successfully!',
                    'alert-type'=>  'success'
                );
                return redirect()->route('teams')->with($notification);
    }
    }
    public function view($id)
    {
        $data = Team::find($id);
        return view('admin.team.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $team = Team::find($request->modal_id);
        $team->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('teams')->with($notification);
    }

    public function delete(Request $request)
    {
        $team = Team::find($request->modal_id);
        unlink($team->image);
        $team->delete();
        $notification = array(
            'messege'   =>  'Delete Team successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('teams')->with($notification);
    }
    public function restore(Request $request)
    {
        $team = Team::find($request->modal_id);
        $team->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore team successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('teams')->with($notification);
    }
    public function publish(Request $request)
    {

        $team = Team::find($request->modal_id);
        $team->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'Team publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('teams')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $team = Team::find($request->modal_id);
        $team->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'Team unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('teams')->with($notification);
    }
}
