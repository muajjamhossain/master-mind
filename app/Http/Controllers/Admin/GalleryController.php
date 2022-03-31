<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Auth;
use App\Model\Gallery;
use App\Model\GalleryCategory;
use Rule;
use Str;
class GalleryController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = Gallery::where('status',1)->get();
        return view('admin.gallery.index', compact('all'));
    }
    public function add()
    {
        $allCate = GalleryCategory::where('status',1)->get();
        return view('admin.gallery.create', compact('allCate'));
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100|min:5',
            'cat_id' => 'required',

      ]);

         $gallery = new Gallery;
         $gallery->title = $request->title;
         $gallery->gallery_category_id = $request->cat_id;
         $gallery->slug = Str::slug($request->title);
         $gallery->admin_id = 1;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/gallery/'.$image_name);
            $gallery->image='public/uploads/gallery/'.$image_name;

            $gallery->save();
            $notification = array(
                      'messege'   =>  'Gallery create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('galleries')->with($notification);
          }else {
            $gallery->save();
            $notification = array(
                      'messege'   =>  'Gallery create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('galleries')->with($notification);
          }
    }
    public function edit($id)
    {
        $allCate = GalleryCategory::all();
       $data = Gallery::find($id);
       return view('admin.gallery.edit', compact('data','allCate'));
    }
    public function update(Request $request)
    {

        $id = $request->id;
        $validatedData = $request->validate([
            'title' => 'required|max:100|min:5',

        ]);
        $gallery =Gallery::find($id);
        $gallery->title = $request->title;
        $gallery->gallery_category_id = $request->cat_id;
        $gallery->slug = Str::slug($request->title);
        $gallery->admin_id = 1;
        $image = $request->image;
        if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/gallery/'.$image_name);
            $gallery->image='public/uploads/gallery/'.$image_name;

            $gallery->save();
            $notification = array(
                      'messege'   =>  'Gallery create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('galleries')->with($notification);
          }else {
            $gallery->save();
            $notification = array(
                      'messege'   =>  'Gallery create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('galleries')->with($notification);
          }
    }
    public function view($id)
    {
        $data = Gallery::find($id);
        return view('admin.gallery.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $gallery = Gallery::find($request->modal_id);
        $gallery->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete gallery successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('galleries')->with($notification);
    }

    public function delete(Request $request)
    {
        $gallery = Gallery::find($request->modal_id);
        unlink($gallery->image);
        $gallery->delete();
        $notification = array(
            'messege'   =>  'Delete gallery successfully',
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

        $gallery = Gallery::find($request->modal_id);
        $gallery->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'gallery publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('galleries')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $gallery = Gallery::find($request->modal_id);
        $gallery->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'gallery unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('galleries')->with($notification);
    }
}
