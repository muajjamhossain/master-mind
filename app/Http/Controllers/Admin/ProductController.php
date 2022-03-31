<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use App\Model\Product;
use App\Model\Category;
use App\Model\ProductCategory;
use App\Model\ProductColor;
use App\Model\ProductFeatureTag;
use App\Model\ProductImage;
use App\Model\ProductLicense;
use App\Model\ProductSize;
use App\Model\ProductWholeSell;
use Illuminate\Support\Facades\Storage;
use Rule;

class ProductController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    public function index()
    {
        $products = Product::where('status', 1)->get();

        return view('admin.product.index', compact('products'));
    }
    public function type()
    {
        return view('admin.product.type');
    }
    public function physicaladd()
    {
        $categories = Category::where('id', '!=', 1)->orderBy('id', 'DESC')->get();
        return view('admin.product.physical.create', compact('categories'));
    }
    public function digitaladd()
    {
        $categories = Category::where('id', '!=', 1)->orderBy('id', 'DESC')->get();
        return view('admin.product.digital.create', compact('categories'));
    }
    public function licenseadd()
    {
        $categories = Category::where('id', '!=', 1)->orderBy('id', 'DESC')->get();
        return view('admin.product.license.create', compact('categories'));
    }
    public function insert(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|unique:products',
            'selling_price' => 'required',
            'category_id' => 'required',
            'sku' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->sku = $request->sku;
        $product->slug = Str::slug($request->name);
        $product->product_condition = $request->condition;
        $product->file_type = $request->file_type;
        $product->link = $request->upload_link;
        // $product->gallery = $request->gallery;
        $product->ship_time = $request->ship_time;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->stock = $request->stock;
        $product->measure = $request->measure;
        $product->description = $request->description;
        $product->policy = $request->policy;
        $product->youtube = $request->video_url;
        $product->meta_tag = $request->meta_tag;
        $product->meta_description = $request->meta_description;
        $product->tags = $request->tag;
        $product->file = $request->upload_file;
        $product->link = $request->upload_link;
        $image = $request->image;
        $file_check = $request->upload_file;
        if($file_check){
            $file = $request->file('upload_file')->store('public/uploads/file/product');
            $product->file =$file;
        }
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('public/uploads/product/' . $image_name);
        $product->image = 'public/uploads/product/' . $image_name;
        $product->save();

        if($product->id != null and $request->category_id != ''){
            $count =count($request->category_id);
            for ($i=0; $i < $count; $i++) {
                $size = New ProductCategory;
                $size->product_id =$product->id;
                $size->category_id =$request->category_id[$i];
                $size->save();
            }
        }

        if($product->id != null and $request->checksize == 'on'){
            $count =count($request->size_name);
            for ($i=0; $i < $count; $i++) {
                $size = New ProductSize;
                $size->product_id =$product->id;
                $size->name =$request->size_name[$i];
                $size->qty =$request->size_qty[$i];
                $size->price =$request->size_price[$i];
                $size->save();
            }
        }
        if($product->id != null and $request->checkcolor == 'on'){
            $count =count($request->color_name);
            for ($i=0; $i < $count; $i++) {
                $color = New ProductColor;
                $color->product_id =$product->id;
                $color->name =$request->color_name[$i];
                $color->qty =$request->color_qty[$i];
                $color->price =$request->color_price[$i];
                $color->save();
            }
        }
        if($product->id != null and $request->checkwholesell == 'on'){
            $count =count($request->whole_parcent);
            for ($i=0; $i < $count; $i++) {
                $whole = New ProductWholeSell;
                $whole->product_id =$product->id;
                $whole->discount =$request->whole_parcent[$i];
                $whole->qty =$request->whole_qty[$i];
                $whole->save();
            }
        }
        if($product->id != null and $request->feature_tag != ''){
            $count =count($request->feature_tag);
            for ($i=0; $i < $count; $i++) {
                $whole = New ProductFeatureTag;
                $whole->product_id =$product->id;
                $whole->tag =$request->feature_tag[$i];
                $whole->value =$request->feature_value[$i];
                $whole->save();
            }
        }
        if($product->id != null and $request->license_key != ''){
            $count =count($request->license_qty);
            for ($i=0; $i < $count; $i++) {
                $license = New ProductLicense;
                $license->product_id =$product->id;
                $license->qty =$request->license_qty[$i];
                $license->key =$request->license_key[$i];
                $license->save();
            }
        }
        if($product->id != null and $request->gallery != ''){
            $count =count($request->gallery);
            for ($i=0; $i < $count; $i++) {

                $image =$request->gallery[$i];
                $p_image = New ProductImage;
                $p_image->product_id =$product->id;
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save('public/uploads/product-gallery/' . $image_name);
                $p_image->gallery = 'public/uploads/product-gallery/' . $image_name;
                $p_image->save();
            }
        }
        $notification = array(
            'messege'   =>  'product create successfully',
            'alert-type' =>  'success'
        );
        return redirect()->route('products')->with($notification);

    }
    public function edit($id)
    {
        $data = Product::find($id);
        $categories = Category::where('id', '!=', 1)->orderBy('id', 'DESC')->get();
        return view('admin.product.edit', compact('data','categories'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = Str::slug($request->name);
        $product->product_condition = $request->condition;
        $product->youtube = $request->video_url;
        $product->file_type = $request->file_type;
        $product->link = $request->upload_link;
        $product->ship_time = $request->ship_time;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->stock = $request->stock;
        $product->measure = $request->measurement;
        $product->description = $request->description;
        $product->policy = $request->policy;
        $product->meta_tag = $request->meta_tag;
        $product->meta_description = $request->meta_description;
        $product->tags = $request->tags;
        $file_check = $request->upload_file;
        if($file_check){
            $file = $request->file('upload_file')->store('public/uploads/file/product');
            $product->file =$file;
            unlink($request->old_file);
        }

        if($product->id != null and $request->category_id != ''){
            $count =count($request->category_id);
            for ($i=0; $i < $count; $i++) {
                $cat = ProductCategory::where('category_id',$request->category_id[$i])->get();
                if($cat != ''){
                    ProductCategory::where('category_id',$request->category_id[$i])->update(['product_id' => $request->pro_id, 'category_id'=> $request->category_id[$i]]);
                }else{
                    $cat = new ProductCategory;
                    $cat->product_id =$request->pro_id;
                    $cat->category_id =$request->category_id[$i];
                    $cat->save();
                }
            }
        }
        $image = $request->image;
        if ($image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 400)->save('public/uploads/product/' . $image_name);
            unlink($request->old_image);
            $product->image = 'public/uploads/product/' . $image_name;

            $product->save();
            $notification = array(
                'messege'   =>  'Product update successfully',
                'alert-type' =>  'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $product->save();
            $notification = array(
                'messege'   =>  'Product update successfully!',
                'alert-type' =>  'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function imageupdate(Request $request)
    {
        if($request->gallery != ''){
            $count =count($request->gallery);
            for ($i=0; $i < $count; $i++) {
                $image =$request->gallery[$i];
                $p_image = New ProductImage;
                $p_image->product_id =$request->pro_id;
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save('public/uploads/product-gallery/' . $image_name);
                $p_image->gallery = 'public/uploads/product-gallery/' . $image_name;
                $p_image->save();

            }
            $notification = array(
                'messege'   =>  'Gallery update successfully!',
                'alert-type' =>  'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function colorupdate(Request $request)
    {
        $count =count($request->color_name);
        for ($i=0; $i < $count; $i++) {
            $color = ProductColor::find($request->item_id);
            if($color){
                ProductColor::find($request->item_id)->update([
                    'name'  => $request->color_name[$i],
                    'qty'  => $request->color_qty[$i],
                    'price'  => $request->color_price[$i],
                ]);
            }else{

                ProductColor::create([
                    'product_id' => $request->pro_id,
                    'name'  => $request->color_name[$i],
                    'qty'  => $request->color_qty[$i],
                    'price'  => $request->color_price[$i],
                ]);
            }
        }
                $notification = array(
                    'messege'   =>  'Color update successfully!',
                    'alert-type' =>  'success'
                );
                return redirect()->back()->with($notification);
    }

    public function sizeupdate(Request $request)
    {
        $count =count($request->color_name);
        for ($i=0; $i < $count; $i++) {
            $color = ProductSize::find($request->item_id);
            if($color){
                ProductSize::find($request->item_id)->update([
                    'name'  => $request->size_name[$i],
                    'qty'  => $request->size_qty[$i],
                    'price'  => $request->size_price[$i],
                ]);
            }else{
                ProductSize::create([
                    'product_id' => $request->pro_id,
                    'name'  => $request->size_name[$i],
                    'qty'  => $request->size_qty[$i],
                    'price'  => $request->size_price[$i],
                ]);
            }
            $notification = array(
                'messege'   =>  'Size update successfully!',
                'alert-type' =>  'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function licenseupdate(Request $request)
    {
        $count =count($request->license_key);
        for ($i=0; $i < $count; $i++) {
            $license = ProductLicense::find($request->item_id);
            if($license){
                $license->update([
                    'product_id' => $request->pro_id,
                    'key'  => $request->license_key[$i],
                    'qty'  => $request->size_qty[$i],
                ]);
            }else{
                ProductLicense::create([
                    'product_id' => $request->pro_id,
                    'key'  => $request->size_name[$i],
                    'qty'  => $request->size_qty[$i],
                ]);
            }
        }
    }

    public function featureupdate(Request $request)
    {
        $count =count($request->feature_tag);
        for ($i=0; $i < $count; $i++) {
            $tag = ProductFeatureTag::find($request->item_id);
            if($tag){
                $tag->update([
                    'product_id' => $request->pro_id,
                    'tag'  => $request->feature_tag[$i],
                    'value'  => $request->feature_value[$i],
                ]);
            }else{
                ProductFeatureTag::create([
                    'product_id' => $request->pro_id,
                    'tag'  => $request->feature_tag[$i],
                    'value'  => $request->feature_value[$i],
                ]);
            }
        }
    }
    public function saleupdate(Request $request)
    {
        $count =count($request->whole_qty);
        for ($i=0; $i < $count; $i++) {
            $whole = ProductWholeSell::find($request->item_id);
            if($whole){
                $whole->update([
                    'product_id' => $request->pro_id,
                    'whole_qty'  => $request->qty[$i],
                    'whole_parcent'  => $request->discount[$i],
                ]);
            }else{
                ProductFeatureTag::create([
                    'product_id' => $request->pro_id,
                    'whole_qty'  => $request->qty[$i],
                    'whole_parcent'  => $request->discount[$i],
                ]);
            }
        }
    }
    public function view($id)
    {
        $data = Product::find($id);
        return view('admin.product.view', compact('data'));
    }

    public function softdelete(Request $request)
    {
        $banner = Product::find($request->modal_id);
        $banner->update(['status' => 0]);
        $notification = array(
            'messege'   =>  'Delete product successfully',
            'alert-type' =>  'success'
        );
        return redirect()->route('products')->with($notification);
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->modal_id);
        unlink($product->image);
        $product->delete();
        $notification = array(
            'messege'   =>  'Delete product successfully',
            'alert-type' =>  'success'
        );
        return redirect()->route('products')->with($notification);
    }
    public function restore(Request $request)
    {
        $product = Product::find($request->modal_id);
        $product->update(['status' => 1]);
        $notification = array(
            'messege'   =>  'Restore product successfully',
            'alert-type' =>  'success'
        );
        return redirect()->route('products')->with($notification);
    }
    public function publish(Request $request)
    {
        $product = Product::find($request->modal_id);
        $product->update(['publish' => 1]);
        $notification = array(
            'messege'   =>  'product publish successfully',
            'alert-type' =>  'success'
        );
        return redirect()->route('products')->with($notification);
    }
    public function unpublish(Request $request)
    {

        $product = Product::find($request->modal_id);
        $product->update(['publish' => 0]);
        $notification = array(
            'messege'   =>  'product unpublish successfully',
            'alert-type' =>  'success'
        );
        return redirect()->route('products')->with($notification);
    }
}
