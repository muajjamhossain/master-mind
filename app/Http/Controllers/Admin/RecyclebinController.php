<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\BlogCategory;
use App\Model\Gallery;
use App\Model\GalleryCategory;
use App\Model\Newsletter;
use App\Model\Team;
use App\Model\Testimonial;
use App\Model\User;
use App\Model\BlogPost;
use App\Model\Contact;
use App\Model\Partner;
use App\Model\Tag;
use Illuminate\Http\Request;

class RecyclebinController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    public function index()
    {
        $user =User::where('status',0)->get()->count();
        $banner =Banner::where('status',0)->get()->count();
        $newsletter =Newsletter::where('status',0)->get()->count();
        $testimonial =Testimonial::where('status',0)->get()->count();
        $gallery =Gallery::where('status',0)->get()->count();
        $gallerycategory =GalleryCategory::where('status',0)->get()->count();
        $team =Team::where('status',0)->get()->count();
        $post =BlogPost::where('status',0)->get()->count();
        $partner =Partner::where('status',0)->get()->count();
        $blogcategory =BlogCategory::where('status',0)->get()->count();
        $tag =Tag::where('status',0)->get()->count();
        return view('admin.recycle.index', compact('user','banner','newsletter','testimonial','gallery','gallerycategory','team','post','blogcategory','tag','partner'));
    }

    public function user()
    {
        $all =User::where('status',0)->get();
       return view('admin.recycle.user', compact('all'));
    }
    public function banner()
    {
        $all =Banner::where('status',0)->get();
       return view('admin.recycle.user', compact('all'));
    }
    public function newsletter()
    {
        $all =Newsletter::where('status',0)->get();
       return view('admin.recycle.newsletter', compact('all'));
    }
    public function contact()
    {
        $all =Contact::where('status',0)->get();
       return view('admin.recycle.contact', compact('all'));
    }
    public function post()
    {
        $all =BlogPost::where('status',0)->get();
       return view('admin.recycle.post', compact('all'));
    }
    public function blogcategory()
    {
        $all =BlogCategory::where('status',0)->get();
       return view('admin.recycle.blog-category', compact('all'));
    }
    public function gallery()
    {
        $all =Gallery::where('status',0)->get();
       return view('admin.recycle.gallery', compact('all'));
    }
    public function gallerycategory()
    {
        $all =GalleryCategory::where('status',0)->get();
       return view('admin.recycle.gallery-category', compact('all'));
    }
    public function partner()
    {
        $all =partner::where('status',0)->get();
       return view('admin.recycle.partner', compact('all'));
    }
    public function team()
    {
        $all =Team::where('status',0)->get();
       return view('admin.recycle.team', compact('all'));
    }
}
