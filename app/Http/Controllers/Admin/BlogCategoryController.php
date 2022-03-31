<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BlogCategory;
use App\Model\BlogPost;
use Illuminate\Http\Request;
use Image;
use Rule;
use Auth;
use Str;
class BlogCategoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = BlogCategory::where('status',1)->get();

        return view('admin.blogcategory.index', compact('all'));
    }
    public function add()
    {
        return view('admin.blogcategory.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200|min:5',
      ]);

         $blogcat = new BlogCategory;
         $blogcat->name = $request->name;
         $blogcat->slug = Str::slug($request->name);
         $blogcat->creator = 1;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/blogcategory/'.$image_name);
            $blogcat->image='public/uploads/blogcategory/'.$image_name;

            $blogcat->save();
            $notification = array(
                      'messege'   =>  'Blogcategory create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('blogcategories')->with($notification);
          }else {
            $blogcat->save();
            $notification = array(
                      'messege'   =>  'Blogcategory create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('blogcategories')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = BlogCategory::find($id);
       return view('admin.blogcategory.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
    'name' => 'required|max:100|min:5',

]);
    $blogcat = BlogCategory::find($id);
    $blogcat->name = $request->name;
    $blogcat->slug = Str::slug($request->name);
    $blogcat->creator = 1;
    $image = $request->image;

    $image = $request->image;
    if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('public/uploads/blogcategory/'.$image_name);
        $blogcat->image='public/uploads/blogcategory/'.$image_name;

        $blogcat->save();
        $notification = array(
                  'messege'   =>  'Blogcategory create successfully',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('blogcategories')->with($notification);
      }else {
        $blogcat->save();
        $notification = array(
                  'messege'   =>  'Blogcategory create successfully!',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('blogcategories')->with($notification);
      }
    }
    public function view($id)
    {
        $data = BlogCategory::find($id);
        return view('admin.blogcategory.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $blogcat = BlogCategory::find($request->modal_id);
        $blogcat->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete Blog category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('blogcategories')->with($notification);
    }

    public function delete(Request $request)
    {
        $blogcat = BlogCategory::find($request->modal_id);
        unlink($blogcat->image);
        $blogcat->delete();
        $notification = array(
            'messege'   =>  'Delete Blog category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('blogcategories')->with($notification);
    }
    public function restore(Request $request)
    {
        $blogcat = BlogCategory::find($request->modal_id);
        $blogcat->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore Blog category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('blogcategories')->with($notification);
    }
    public function publish(Request $request)
    {

        $banner = BlogCategory::find($request->modal_id);
        $banner->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'Banner publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $banner = BlogCategory::find($request->modal_id);
        $banner->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'Banner unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }
}
