<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;
use Image;
use Auth;
use Config;
use Schema;
class SettingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }
    public function index()
    {

        return view('admin.settings.index');
    }


    public function update(Request $request)
    {
        if ($request->has('site_logo') && ($request->file('site_logo'))) {

            if (config('settings.site_logo') != null) {
                unlink(config('settings.site_logo'));
            }
            $setting= new Setting;
            $image =$request->site_logo;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(266,52)->save('public/uploads/logo/'.$image_name);
            $final ='public/uploads/logo/'.$image_name;
            Setting::set('site_logo', $final);

        }
    elseif ($request->has('site_footer_logo') && ($request->file('site_footer_logo'))) {

            if (config('settings.site_footer_logo') != null) {
                unlink(config('settings.site_footer_logo'));
            }
            $setting= new Setting;
            $image =$request->site_footer_logo;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(216,43)->save('public/uploads/logo/'.$image_name);
            $final ='public/uploads/logo/'.$image_name;
            Setting::set('site_footer_logo', $final);

        }

    elseif ($request->has('site_favicon') && ($request->file('site_favicon'))) {

            if (config('settings.site_favicon') != null) {
                unlink(config('settings.site_favicon'));
            }

            $image =$request->site_favicon;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(16,16)->save('public/uploads/logo/'.$image_name);
            $final ='public/uploads/logo/'.$image_name;

            Setting::set('site_favicon', $final);

        }
    elseif ($request->has('site_preloader') && ($request->file('site_preloader') )) {

            if (config('settings.site_preloader') != null) {
                unlink(config('settings.site_preloader'));
            }

            $image =$request->site_preloader;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('public/uploads/logo/'.$image_name);
            $final ='public/uploads/logo/'.$image_name;
            Setting::set('site_preloader', $final);

        }
    elseif ($request->has('site_image') && ($request->file('site_image') )) {

            if (config('settings.site_image') != null) {
                unlink(config('settings.site_image'));
            }

            $image =$request->site_image;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(380,280)->save('public/uploads/logo/'.$image_name);
            $final ='public/uploads/logo/'.$image_name;
            Setting::set('site_image', $final);

        }

    else {

            $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {

             Setting::set($key, $value);
            }

        }
        $notification=array(
            'messege'=>'Successfully Done',
             'alert-type'=>'success'
       );
        return redirect()->back()->with($notification);
        // return $this->responseRedirectBack('Settings updated successfully.', 'success');
    }

}
