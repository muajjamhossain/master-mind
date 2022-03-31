<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Rule;
use App\Model\Banner;
use Illuminate\Support\Str;
class BannerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }
    public function index()
    {
        $banners = Banner::where('status','!=', 0)->get();

        return view('admin.banner.index', compact('banners'));
    }
    public function add()
    {
        return view('admin.banner.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100|min:5',
            'image' => 'required',
      ]);

         $banner = new Banner;
         $banner->title = $request->title;
         $banner->discount = $request->discount;
         $banner->details = $request->details;
         $banner->slug = 'BAN_'.uniqid(20);
         $banner->button = $request->button;
         $banner->button_url = $request->button_url;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1349,562)->save('public/uploads/banner/'.$image_name);
            $banner->image='public/uploads/banner/'.$image_name;

            $banner->save();
            $notification = array(
                      'messege'   =>  'Banner create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('banners')->with($notification);
          }else {
            $banner->save();
            $notification = array(
                      'messege'   =>  'Banner create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('banners')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = Banner::find($id);
       return view('admin.banner.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
    'title' => 'required|max:100|min:5',
]);
    $banner = Banner::find($id);
    $banner->title = $request->title;
    $banner->discount = $request->discount;
    $banner->details = $request->details;
    $banner->slug = 'BAN_'.uniqid(20);
    $banner->button = $request->button;
    $banner->button_url = $request->button_url;
    $image = $request->image;
    if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1349,562)->save('public/uploads/banner/'.$image_name);
        // unlink($banner->image);
        $banner->image='public/uploads/banner/'.$image_name;

        $banner->save();
        $notification = array(
                  'messege'   =>  'Banner update successfully',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('banners')->with($notification);
      }else {
        $banner->save();
        $notification = array(
                  'messege'   =>  'Banner update successfully!',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('banners')->with($notification);
      }
    }
    public function view($id)
    {
        $data = Banner::find($id);
        return view('admin.banner.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        Banner::find($request->modal_id)->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }

    public function delete(Request $request)
    {
        $banner = Banner::find($request->modal_id);
        unlink($banner->image);
        $banner->delete();
        $notification = array(
            'messege'   =>  'Delete banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }
    public function restore(Request $request)
    {
        $banner = Banner::find($request->modal_id);
        $banner->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }
    public function publish(Request $request)
    {

        $banner = Banner::find($request->modal_id);
        $banner->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'Banner publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $banner = Banner::find($request->modal_id);
        $banner->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'Banner unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }
}
