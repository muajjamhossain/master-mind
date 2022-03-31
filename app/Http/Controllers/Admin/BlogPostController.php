<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BlogPost;
use App\Model\BlogCategory;
use Illuminate\Http\Request;
use Str;
use Image;
use Auth;
use Rule;
class BlogPostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = BlogPost::where('status', 1)->get();

        return view('admin.blogpost.index', compact('all'));
    }
    public function add()
    {

        return view('admin.blogpost.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'details' => 'required',

      ]);

         $blogpost = new BlogPost;
         $blogpost->title = $request->title;
         $blogpost->details = $request->details;
         $blogpost->slug = Str::slug($request->title);
         $blogpost->creator = 1;
         $blogpost->tag = $request->tag;
         $blogpost->blog_category_id = $request->blog_category_id;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/blogpost/'.$image_name);
            $blogpost->image='public/uploads/blogpost/'.$image_name;

            $blogpost->save();
            $notification = array(
                      'messege'   =>  'Blog post create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('blogposts')->with($notification);
          }else {
            $blogpost->save();
            $notification = array(
                      'messege'   =>  'Blog Post create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('blogposts')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = BlogPost::find($id);
       return view('admin.blogpost.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
    'title' => 'required|max:100|min:5',
    'image' => 'required',

]);
    $banner = new Banner;
    $banner->title = $request->title;
    $banner->details = $request->details;
    $banner->slug = 'BAN_'.uniqid(20);
    $banner->button = $request->button;
    $banner->button_url = $request->button_url;
    $image = $request->image;

    $image = $request->image;
    if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,400)->save('public/uploads/banner/'.$image_name);
        unlink($banner->image);
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
        $data = BlogPost::find($id);
        return view('admin.blogpost.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $banner = BlogPost::find($request->modal_id);
        $banner->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('blogposts')->with($notification);
    }

    public function delete(Request $request)
    {
        $blogpost = BlogPost::find($request->model_id);
        unlink($blogpost->image);
        $blogpost->delete();
        $notification = array(
            'messege'   =>  'Delete Blogpost successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('blogposts')->with($notification);
    }
    public function restore(Request $request)
    {
        $banner = BlogPost::find($request->model_id);
        $banner->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('blogposts')->with($notification);
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
