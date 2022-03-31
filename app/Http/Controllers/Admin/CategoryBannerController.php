<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Banner;
use App\Model\Category;
use App\Model\CategoryBanner;
use Image;
class CategoryBannerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $banners = CategoryBanner::where('status',1)->get();
        return view('admin.product.categorybanner.index', compact('banners'));
    }
    public function add()
    {
        $categories =Category::orderByRaw('-name ASC')
       ->get()
       ->nest()
       ->setIndent('|–– ')
       ->listsFlattened('name');

        return view('admin.product.categorybanner.create',compact('categories'));
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100|min:5',
            'image' => 'required',
      ]);

         $banner = new CategoryBanner;
         $banner->category_id = $request->category_id;
         $banner->title = $request->title;
         $banner->discount = $request->discount;
         $banner->check_content = $request->checkcontent;
         $banner->slug = 'BAN_'.uniqid(20);
         $banner->button = $request->button;
         $banner->url = $request->button_url;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('public/uploads/banner/'.$image_name);
            $banner->image='public/uploads/banner/'.$image_name;

            $banner->save();
            $notification = array(
                      'messege'   =>  'Category Banner create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('category.banners')->with($notification);
          }else {
            $banner->save();
            $notification = array(
                      'messege'   =>  'Category Banner create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('category.banners')->with($notification);
          }
    }
    public function edit($id)
    {
        $categories =Category::orderByRaw('-name ASC')
        ->get()
        ->nest()
        ->setIndent('|–– ')
        ->listsFlattened('name');

       $banner = CategoryBanner::find($id);
       return view('admin.product.categorybanner.edit', compact('banner','categories'));
    }
    public function update(Request $request)
    {
    $id = $request->id;
    $validatedData = $request->validate([
        'title' => 'required|max:100|min:5',
    ]);
    $banner = CategoryBanner::find($id);
    $banner->category_id = $request->category_id;
    $banner->title = $request->title;
    $banner->discount = $request->discount;
    $banner->check_content = $request->checkcontent;
    $banner->slug = 'BAN_'.uniqid(20);
    $banner->button = $request->button;
    $banner->url = $request->button_url;
    $image = $request->image;
    if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('public/uploads/banner/'.$image_name);
        unlink($banner->image);
        $banner->image='public/uploads/banner/'.$image_name;

        $banner->save();
        $notification = array(
                  'messege'   =>  'Banner update successfully',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('category.banners')->with($notification);
      }else {
        $banner->save();
        $notification = array(
                  'messege'   =>  'Banner update successfully!',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('category.banners')->with($notification);
      }
    }
    public function view($id)
    {
        $banner = CategoryBanner::find($id);
        return view('admin.product.categorybanner.view', compact('banner'));
    }

    public function softdelete(Request $request)
    {
        Banner::find($request->modal_id)->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('category.banners')->with($notification);
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
             return redirect()->route('category.banners')->with($notification);
    }
    public function restore(Request $request)
    {
        $banner = Banner::find($request->modal_id);
        $banner->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore banner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('category.banners')->with($notification);
    }
    public function publish(Request $request)
    {

        $banner = Banner::find($request->modal_id);
        $banner->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'Banner publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('category.banners')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $banner = Banner::find($request->modal_id);
        $banner->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'Banner unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('category.banners')->with($notification);
    }
}
