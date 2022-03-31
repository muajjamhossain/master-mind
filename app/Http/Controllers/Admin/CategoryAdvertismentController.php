<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\CategoryAdvertisment;
use Illuminate\Http\Request;

class CategoryAdvertismentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $banners = CategoryAdvertisment::where('status','!=', 0)->get();

        return view('admin.category.banner.index', compact('category.banners'));
    }
    public function add()
    {
        return view('admin.category.banner.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100|min:5',
            'image' => 'required',
      ]);

         $banner = new CategoryAdvertisment;
         $banner->title = $request->title;
         $banner->discount = $request->discount;
         $banner->slug = 'ADS_'.uniqid(20);
         $banner->button = $request->button;
         $banner->url = $request->button_url;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1349,562)->save('public/uploads/category/'.$image_name);
            $banner->image='public/uploads/category/'.$image_name;

            $banner->save();
            $notification = array(
                      'messege'   =>  'Category create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('categoryads')->with($notification);
          }else {
            $banner->save();
            $notification = array(
                      'messege'   =>  'Category create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('categoryads')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = CategoryAdvertisment::find($id);
       return view('admin.category.banner.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
    'title' => 'required|max:100|min:5',
]);
    $banner = CategoryAdvertisment::find($id);
    $banner->title = $request->title;
    $banner->discount = $request->discount;
    $banner->slug = 'ADS_'.uniqid(20);
    $banner->button = $request->button;
    $banner->url = $request->button_url;
    $image = $request->image;
    if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1349,562)->save('public/uploads/category/'.$image_name);
        unlink($banner->image);
        $banner->image='public/uploads/category/'.$image_name;

        $banner->save();
        $notification = array(
                  'messege'   =>  'Ads update successfully',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('categoryads')->with($notification);
      }else {
        $banner->save();
        $notification = array(
                  'messege'   =>  'Ads update successfully!',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('categoryads')->with($notification);
      }
    }
    public function view($id)
    {
        $data = CategoryAdvertisment::find($id);
        return view('admin.category.banner.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        CategoryAdvertisment::find($request->modal_id)->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete Ads successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categoryads')->with($notification);
    }

    public function delete(Request $request)
    {
        $banner = CategoryAdvertisment::find($request->modal_id);
        unlink($banner->image);
        $banner->delete();
        $notification = array(
            'messege'   =>  'Delete Ads successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categoryads')->with($notification);
    }
    public function restore(Request $request)
    {
        $banner = CategoryAdvertisment::find($request->modal_id);
        $banner->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore Ads successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categoryads')->with($notification);
    }
    public function publish(Request $request)
    {

        $banner = CategoryAdvertisment::find($request->modal_id);
        $banner->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'Ads publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categoryads')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $banner = CategoryAdvertisment::find($request->modal_id);
        $banner->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'Ads unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categoryads')->with($notification);
    }
}
