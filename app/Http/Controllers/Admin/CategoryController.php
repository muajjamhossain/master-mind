<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Image;
use Str;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    public function treelsit()
    {
       $categories =Category::orderByRaw('-name ASC')
       ->get()
       ->nest()
       ->setIndent('|–– ')
       ->listsFlattened('name');
    }

    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $categories = Category::where('status',1)->get();
        return view('admin.category.index',compact('categories') );
    }
    public function add()
    {
        $categories =Category::orderByRaw('-name ASC')
       ->get()
       ->nest()
       ->setIndent('|–– ')
       ->listsFlattened('name');
        return view('admin.category.create',compact('categories'));
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            // 'parent_id' => 'required',

      ]);

         $category = new Category;
         $category->name = $request->name;
         $category->description = $request->description;
         $category->slug = Str::slug($request->name);
         $category->parent_id = $request->parent_id;
         $category->featured = $request->featured;
         $category->menu = $request->menu;
         $category->icon = $request->icon;
         $image = $request->image;
         if ($image) {
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/uploads/category/'.$image_name);
            $category->image='public/uploads/category/'.$image_name;

            $category->save();
            $notification = array(
                      'messege'   =>  'Category create successfully',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('categories')->with($notification);
          }else {
            $category->save();
            $notification = array(
                      'messege'   =>  'Category create successfully!',
                          'alert-type'=>  'success'
                       );
                       return redirect()->route('categories')->with($notification);
          }
    }
    public function edit($id)
    {
       $targetCategory = Category::find($id);
       $categories =Category::where('id', '!=', $id)->orderByRaw('-name ASC')
       ->get()
       ->nest()
       ->setIndent('|–– ')
       ->listsFlattened('name');

       return view('admin.category.edit', compact('targetCategory','categories'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => ['required' , Rule::unique('categories')->ignore($id),'max:100',],
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->featured = $request->featured;
        $category->menu = $request->menu;
        $category->icon = $request->icon;
        $image = $request->image;
        if ($image) {
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('public/uploads/category/'.$image_name);
        $category->image='public/uploads/category/'.$image_name;

        $category->save();
        $notification = array(
                    'messege'   =>  'Category create successfully',
                        'alert-type'=>  'success'
                    );
                    return redirect()->route('categories')->with($notification);
        }else {
        $category->save();
        $notification = array(
                    'messege'   =>  'Category create successfully!',
                        'alert-type'=>  'success'
                    );
                    return redirect()->route('categories')->with($notification);
        }
    }
    public function view($id)
    {
        $data = Banner::find($id);
        return view('admin.banner.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $category = Category::find($request->modal_id);
        $category->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categories')->with($notification);
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->modal_id);
        unlink($category->image);
        $category->delete();
        $notification = array(
            'messege'   =>  'Delete category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categories')->with($notification);
    }
    public function restore(Request $request)
    {
        $category = Category::find($request->modal_id);
        $category->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore category successfully',
                'alert-type'=>  'success'
             );
             return redirect()->route('categories')->with($notification);
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
