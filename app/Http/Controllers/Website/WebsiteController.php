<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Cart;
class WebsiteController extends Controller
{
    public function index()
    {
        $banners =Banner::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('website.pages.index', compact('banners'));
    }

    public function categoryproduct($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('website.pages.category', compact('category'));
    }
    public function subcategoryproduct($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('website.pages.subcategory', compact('category'));
    }
    public function childcategoryproduct($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('website.pages.childcategory', compact('category'));
    }
    public function productdetails($slug)
    {
        $product = Product::where('status',1)->where('slug',$slug)->first();
        return view('website.pages.product_details', compact('product'));
    }

}
