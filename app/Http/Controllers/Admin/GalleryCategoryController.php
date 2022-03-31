<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use Illuminate\Http\Request;
use Auth;
use App\Model\GalleryCategory;
use Str;
use Image;
class GalleryCategoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = GalleryCategory::where('status', 1)->get();

        return view('admin.gallery.category.index', compact('all'));
    }
    public function add()
    {
        return view('admin.gallery.category.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|min:5',
      ]);

         $gcate = new GalleryCategory;
         $gcate->name = $request->name;
         $gcate->remarks = $request->remarks;
         $gcate->slug = Str::slug($request->name);
         $image =$request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/gallery/'.$image_name);
            $gcate->image='public/uploads/gallery/'.$image_name;

            $gcate->save();
            $notification = array(
                      'messege'   =>  'GalleryCategory create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('gallery-categories')->with($notification);
          }else {
            $gcate->save();
            $notification = array(
                      'messege'   =>  'Banner create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('gallery-categories')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = GalleryCategory::find($id);
       return view('admin.gallery.category.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
    'name' => 'required|max:100|min:5',

]);
$gcate = GalleryCategory::find($id);
$gcate->name = $request->name;
$gcate->remarks = $request->remarks;
$gcate->slug = Str::slug($request->name);
$image =$request->image;
if ($image) {
   $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
   Image::make($image)->resize(300,300)->save('public/uploads/gallery/'.$image_name);
   $gcate->image='public/uploads/gallery/'.$image_name;

   $gcate->save();
   $notification = array(
             'messege'   =>  'GalleryCategory create successfully',
                 'alert-type'=>  'success'
              );
              return redirect()->route('gallery-categories')->with($notification);
 }else {
   $gcate->save();
   $notification = array(
             'messege'   =>  'Banner create successfully!',
                 'alert-type'=>  'success'
              );
              return redirect()->route('gallery-categories')->with($notification);
 }
    }
    public function view($id)
    {
        $data = GalleryCategory::find($id);
        return view('admin.gallery.category.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $gcate = GalleryCategory::find($request->modal_id);
        $gcate->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete gallery category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('gallery-categories')->with($notification);
    }

    public function delete(Request $request)
    {
        $gallery = Gallery::find($request->modal_id);
        unlink($gallery->image);
        $gallery->delete();
        $notification = array(
            'messege'   =>  'Delete gallery category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('galleries')->with($notification);
    }
    public function restore(Request $request)
    {
        $gallery = Gallery::find($request->modal_id);
        $gallery->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore gallery successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('galleries')->with($notification);
    }
    public function publish(Request $request)
    {

        $banner = GalleryCategory::find($request->modal_id);
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
