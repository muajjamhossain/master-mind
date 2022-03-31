<?php

namespace App\Http\Controllers\website;

use App\Model\Product;
use Illuminate\Http\Request;
use Cart;
use Response;
use DB;
use Auth;
use Laravel\Ui\Presets\React;
use Session;
use App\Http\Controllers\Controller;
class CartController extends Controller
{


    // ajax request to add cart add here start
    // public function AddCart($id)
    // {

    //   $product = Product::findorfail($id);
    //   $data = array();
    //   if ($product->discount_price == NULL) {
    // 	  	            $data['id']=$product->id;
    // 	                $data['name']=$product->product_name;
    // 	                $data['qty']=1;
    // 	                $data['price']= $product->selling_price;
    // 	 				        $data['weight']=1;
    // 	                $data['options']['image']=$product->image_one;
    //                   $data['options']['color']='';
    //                   $data['options']['size']='';
    // 	               Cart::add($data);
    // 	               return response()->json(['success' => 'Successfully Added on your Cart']);
    // 	   }else{
    // 	               $data['id']=$product->id;
    // 	                $data['name']=$product->product_name;
    // 	                $data['qty']=1;
    // 	                $data['price']= $product->discount_price;
    // 	 				        $data['weight']=1;
    // 	                $data['options']['image']=$product->image_one;
    //                     $data['options']['color']='';
    //                     $data['options']['size']='';
    //
    // 	                Cart::add($data);
    // 	              return response()->json(['success' => 'Successfully Added on your Cart']);
    // 	 }
    //
    //
    //
    // }
    // ajax request to add cart add here end

     public function check()
   {
    $content= Cart::content();
      return response()->json($content);
    }

    public function ViewProduct($id)
    {


    //   $product = DB::table('products')
    //                                 ->join('categories','products.category_id','categories.id')
    //                                 ->join('sub_categories','products.subcategory_id','sub_categories.id')
    //                                 ->select('products.*','categories.slug','sub_categories.name')
    //                                 ->where('products.id',$id)->first();

    $product = Product::find($id);
        $category = $product->categories->first()->name;
        // return $product->colors;
              $color =$product->colors;
              $size =$product->sizes;

            //  return response()->json(['product' => $product,
            //  'color' => $product_color,
            //   'size' => $product_size]);

              return response::json(array(
                      'product' => $product,
                      'color' => $color,
                       'size' => $size,
                       'cat' => $category,
               ));
    }
    public function InsertCart(Request $request)
    {
        // dd($request->all());
      $id =$request->product_id;
      $color =$request->color;
      $size =$request->size;
      $qty =$request->qty;

      $product = Product::where('status', 1)->find($id);
      $data = array();
      if ($product) {
      if ($product->discount_price == '') {
    	  	            $data['id']=$product->id;
    	                $data['name']=$product->name;
    	                $data['qty']=$qty;
    	                $data['price']= $product->selling_price;
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->image_one;
                        $data['options']['color']=$color;
                        $data['options']['size']=$size;
                        $data['options']['color_id']=$size;
                        $data['options']['size_id']=$size;
                       Cart::add($data);
                     $notification=array(
                              'messege'=>'Successfully Done',
                               'alert-type'=>'success'
                         );
                         return redirect()->back()->with($notification);
    	   }else{

    	                $data['id']=$product->id;
    	                $data['name']=$product->name;
    	                $data['qty']=$qty;
    	                $data['price']= $product->discount_price;
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->image_one;
                        $data['options']['color']=$color;
                        $data['options']['size']=$size;

                        Cart::add($data);
                      $notification=array(
                                'messege'=>'Successfully Done',
                                 'alert-type'=>'success'
                           );
                           return redirect()->back()->with(['messege'=>'Successfully Done','alert-type'=>'success']);
    	 }
     }else {
       $notification=array(
                 'messege'=>'This product Out of Stock',
                  'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
     }
    }
    public function InsertwishlistCart(Request $request)
    {
      $id =$request->product_id;
      $wishlist_id =$request->wishlist_id;
      $wishlist = Wishlist::findorfail($wishlist_id);
      $product = Product::where('product_stock', 'Available')->find($id);

      $data = array();
      if ($product) {
      if ($product->discount_price == NULL) {
                      $data['id']=$product->id;
                      $data['name']=$product->product_name;
                      $data['qty']=$request->qty;
                      $data['price']= $product->selling_price;
                      $data['weight']=1;
                      $data['options']['image']=$product->image_one;
                      $data['options']['color']=$request->color;
                      $data['options']['size']=$request->size;
                     Cart::add($data);
                     $wishlist->delete();
                     $notification=array(
                              'messege'=>'Successfully Added in cart',
                               'alert-type'=>'success'
                         );
                         return redirect()->back()->with($notification);
         }else{
                     $data['id']=$product->id;
                      $data['name']=$product->product_name;
                      $data['qty']=$request->qty;
                      $data['price']= $product->discount_price;
                      $data['weight']=1;
                      $data['options']['image']=$product->image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;

                      Cart::add($data);
                      $wishlist->delete();
                      $notification=array(
                                'messege'=>'Successfully Added in cart',
                                 'alert-type'=>'success'
                           );
                           return redirect()->back()->with($notification);
       }
     }else {
       $notification=array(
                 'messege'=>'This product Out of Stock',
                  'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
     }


    }

    public function showcart()
    {
      $cart = Cart::content();
      return view('website.pages.cart', compact('cart'));
    }
    public function cartremove($id)
    {
      $cart =Cart::remove($id);

      $notification=array(
                'messege'=>'This iteam deleted',
                 'alert-type'=>'error'
           );
           return redirect()->back()->with($notification);
    }
    public function UpdateCart(Request $request)
    {
      $rowId = $request->id;
      $qty = $request->qty;
      Cart::update($rowId, $qty);
      return redirect()->back();;

    }

    public function Wishlist()
    {
      $id = Auth::id();
      $product =Wishlist::where('user_id', 1)->get();
    //   dd($product);
      return view('pages.wishlist', compact('product'));
    }
    public function checkout()
    {
        return view('website.pages.checkout');
    }
    public function applycoupon(Request $request)
    {
        $coupon= $request->coupon;
        $check = Coupon::where('code', $coupon)->where('status', 1)->first();

    if ($check) {
        session::put('coupon',[
            'name' => $check->code,
            'price' => $check->price,
            'balance' => Cart::Subtotal() - $check->price
        ]);
            $notification=array(
                            'messege'=>'apply your coupon successfuly',
                                'alert-type'=>'success'
                        );
                            return redirect()->back()->with($notification);
    }
    $notification=array(
                        'messege'=>'Invalied Coupon',
                        'alert-type'=>'error'
                    );
                    return redirect()->back()->with($notification);
        }
        public function removecoupon()
        {
            session::forget('coupon');
            $notification=array(
                'messege'=>'Coupon Removed',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
}
