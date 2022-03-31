<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Model\Partner;
use Auth;
use Rule;
use Str;
class PartnerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = Partner::where('status','!=', 0)->get();

        return view('admin.partner.index', compact('all'));
    }
    public function add()
    {
        return view('admin.partner.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'logo' => 'required',

      ]);

         $partner = new Partner;
         $partner->title = $request->title;
         $partner->url = $request->url;
         $partner->slug = Str::slug($request->title);
         $image = $request->logo;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/partner/'.$image_name);
            $partner->logo='public/uploads/partner/'.$image_name;

            $partner->save();
            $notification = array(
                      'messege'   =>  'Partner create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('partners')->with($notification);
          }else {
            $partner->save();
            $notification = array(
                      'messege'   =>  'Partner create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('partners')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = Partner::find($id);
       return view('admin.product.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
    'title' => 'required|max:100|min:5',

]);
    $partner = Partner::find($id);
    $partner->title = $request->title;
    $partner->url = $request->url;
    $partner->slug = Str::slug($request->title);
    $image = $request->logo;
    if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('public/uploads/partner/'.$image_name);
        unlink($partner->logo);
        $partner->logo='public/uploads/partner/'.$image_name;

        $partner->save();
        $notification = array(
                  'messege'   =>  'Partner create successfully',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('partners')->with($notification);
      }else {
        $partner->save();
        $notification = array(
                  'messege'   =>  'Partner create successfully!',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('partners')->with($notification);
      }
    }
    public function view($id)
    {
        $data = Partner::find($id);
        return view('admin.partner.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $partner = Partner::find($request->modal_id);
        $partner->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Partner deleted successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('partners')->with($notification);
    }

    public function delete(Request $request)
    {
        $partner = Partner::find($request->modal_id);
        unlink($partner->logo);
        $partner->delete();
        $notification = array(
            'messege'   =>  'Delete partner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('partners')->with($notification);
    }
    public function restore(Request $request)
    {
        $partner = Partner::find($request->modal_id);
        $partner->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore partner successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('partners')->with($notification);
    }
    public function publish(Request $request)
    {

        $partner = Partner::find($request->modal_id);
        $partner->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'Partner publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('banners')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $partner = Partner::find($request->modal_id);
        $partner->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'Partner unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('partners')->with($notification);
    }
}
