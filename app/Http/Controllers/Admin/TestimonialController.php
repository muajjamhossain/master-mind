<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Testimonial;
use Image;
use Str;
use Rule;
class TestimonialController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = Testimonial::where('status', 1)->get();

        return view('admin.testimonial.index', compact('all'));
    }
    public function add()
    {
        return view('admin.testimonial.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'review' => 'required',
            'designation' => 'required',
            'company' => 'required',

      ]);
         $test = new Testimonial;
         $test->name = $request->name;
         $test->review = $request->review;
         $test->designation = $request->designation;
         $test->slug = 'Testm_'.uniqid(20);
         $test->company = $request->company;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/testimonial/'.$image_name);
            $test->image='public/uploads/testimonial/'.$image_name;

            $test->save();
            $notification = array(
                      'messege'   =>  'Testimonial create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('testimonials')->with($notification);
          }else {
            $test->save();
            $notification = array(
                      'messege'   =>  'Banner create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('testimonials')->with($notification);
          }
    }
    public function edit($id)
    {
       $data = Testimonial::find($id);
       return view('admin.testimonial.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
  $validatedData = $request->validate([
            'name' => 'required',
            'review' => 'required',
            'designation' => 'required',
            'company' => 'required',
]);
    $test = Testimonial::find($id);
    $test->name = $request->name;
    $test->review = $request->review;
    $test->designation = $request->designation;
    $test->slug = 'Testm_'.uniqid(20);
    $test->company = $request->company;

    $image = $request->image;
    if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('public/uploads/testimonial/'.$image_name);
        $test->image='public/uploads/testimonial/'.$image_name;

        $test->save();
        $notification = array(
                  'messege'   =>  'Testimonial update successfully',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('testimonials')->with($notification);
      }else {
        $test->save();
        $notification = array(
                  'messege'   =>  'Banner update successfully!',
                      'alert-type'=>  'success'
                   );
                   return redirect()->route('testimonials')->with($notification);
      }
    }
    public function view($id)
    {
        $data = Testimonial::find($id);
        return view('admin.testimonial.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $test = Testimonial::find($request->modal_id);
        $test->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete testimonial successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('testimonials')->with($notification);
    }

    public function delete(Request $request)
    {
        $test = Testimonial::find($request->modal_id);
        unlink($test->image);
        $test->delete();
        $notification = array(
            'messege'   =>  'Delete testimonial successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('testimonials')->with($notification);
    }
    public function restore(Request $request)
    {
        $tset = Testimonial::find($request->modal_id);
        $tset->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore testimonial successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('testimonials')->with($notification);
    }
    public function publish(Request $request)
    {

        $test = Testimonial::find($request->modal_id);
        $test->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'Testimonial publish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('testimonials')->with($notification);
    }
    public function unpublish(Request $request)
    {
        $tset = Testimonial::find($request->modal_id);
        $tset->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'Testimonial unpublish successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('testimonials')->with($notification);
    }
}
