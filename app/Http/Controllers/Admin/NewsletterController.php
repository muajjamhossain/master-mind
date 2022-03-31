<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Newsletter;
class NewsletterController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $all = Newsletter::where('status', 1)->get();

        return view('admin.newsletter.index', compact('all'));
    }
    public function add()
    {
        return view('admin.newsletter.create');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
      ]);
         $newsl = new Newsletter;
         $newsl->email = $request->email;
         $notification = array(
            'messege'   =>  'Newsletter create successfully',
            'alert-type'=>  'success'
             );
        return redirect()->route('newsletters')->with($notification);
    }


    public function view($id)
    {
        $data = Newsletter::find($id);
        return view('admin.testimonial.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $news = Newsletter::find($request->modal_id);
        $news->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete newsletter successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('newsletters')->with($notification);
    }

    public function delete(Request $request)
    {
        $news = Newsletter::find($request->modal_id);
        unlink($news->image);
        $news->delete();
        $notification = array(
            'messege'   =>  'Delete Newsletter successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('newsletters')->with($notification);
    }
    public function restore(Request $request)
    {
        $tset = Newsletter::find($request->modal_id);
        $tset->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore testimonial successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('testimonials')->with($notification);
    }

}
