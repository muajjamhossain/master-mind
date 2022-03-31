@extends('layouts.app')
@section('content')
<!-- others banner start -->
    <section class="other_page_banner_part" id="other_page_banner_sec">
        <div class="overlay_other_banner_page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="other_page_banner_content">
                            <h1>{{ $category->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- others banner end -->


<!-- breadcrumb part start -->
    <section class="breadcrumb_part" id="breadcrumb_sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category_product',$category->slug) }}">{{ $category->name }}</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Rice</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end -->

<!-- FOOD & GROCERY part start -->
<section class="common_deal_part food_grocery_part py_60" id="food_grocery_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-lg-3">
                <div class="common_deal_nav_site">
                    <h5>{{ $category->name }} <i class="fas fa-angle-down"></i></h5>
                    <ul>
                        @foreach ($category->children as $key => $child)
                        <li><a href="#">{{ $child->name }}<i class="fas fa-arrow-right"></i></a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="common_deal_nav_site_add mt_30">
                    <a href="#">
                        <img src="images/site_add_img1.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-md-9 col-sm-8 col-lg-9 mmt_30">
                <div class="food_grocery_cont food_view_all">
                    <div class="row mx-7_5">
                        @foreach ($category->products as $product)
                        <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="{{ URL::to($product->image) }}" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="{{ URL::to($product->image)  }}"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>{{ $product->name }}</h5>
                                <h4><span>৳</span>{{ $product->price ?? $product->discount_price ?? $product->selling_price ?? ""  }}</h4>
                                <a href="#" class="btn add_card_btn" id="{{ $product->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">ADD TO CART</a>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-md-4 col-lg-4 col-sm-6 col-12 mmt_30">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item2.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item2.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Mozammel Chinigura Rice - 1kg</h5>
                                <h4><span>৳</span>130.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6 col-12 mmt_30 smmt_15">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item3.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item3.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Pran Kalijeera Rice – 5kg</h5>
                                <h4><span>৳</span>300.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6 col-12 mt_30">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item4.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item4.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Pran Kalijeera Rice – 5kg</h5>
                                <h4><span>৳</span>300.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6 col-12 mt_30">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item5.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item5.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Pran Kalijeera Rice – 5kg</h5>
                                <h4><span>৳</span>300.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6 col-12 mt_30">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item6.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item6.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Pran Kalijeera Rice – 5kg</h5>
                                <h4><span>৳</span>300.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div>
                         <div class="col-md-4 col-lg-4 col-sm-6 col-12 mt_30">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item7.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item7.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Pran Kalijeera Rice – 5kg</h5>
                                <h4><span>৳</span>300.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div>
                         <div class="col-md-4 col-lg-4 col-sm-6 col-12 mt_30">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item8.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item8.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Pran Kalijeera Rice – 5kg</h5>
                                <h4><span>৳</span>300.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div>
                         <div class="col-md-4 col-lg-4 col-sm-6 col-12 mt_30">
                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="images/rice_item9.jpg" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="images/rice_item9.jpg"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5>Pran Kalijeera Rice – 5kg</h5>
                                <h4><span>৳</span>300.00</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hot deal part end -->


<!--product cart add modal-->
    <!-- Modal -->
    <div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="row">
              <div class="col-md-4">
                  <div class="card" style="width: 16rem;">
                  <img src="" class="card-img-top" id="pimage" style="height: 240px;">
                  <div class="card-body">

                  </div>
                </div>
              </div>
              <div class="col-md-4 ml-auto">
                  <ul class="list-group">
                    <li class="list-group-item"> <h5 class="card-title" id="pname"></h5></span></li>
                    <li class="list-group-item">Product code: <span id="pcode"></span></li>
                    <li class="list-group-item">Category:<span id="pcat" style="color: rgb(93, 93, 211)"> </span></li>
                    <li class="list-group-item">Stock: <span class="badge" id="stock" style="background: green; color:white;"></span></li>
                </ul>
              </div>
              <div class="col-md-4 ">
                  <form action="" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                        <input type="hidden" name="color_id">
                        <div class="form-group" id="colordiv">
                        <label for="">Color</label>
                        <select name="color" class="form-control">
                        </select>
                        </div>
                        <div class="form-group" id="sizediv" >
                        <label for="exampleInputEmail1">Size</label>
                        <select name="size" class="form-control" id="size">
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="number" class="form-control" value="1" name="qty">
                        </div>
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                  </form>
               </div>
             </div>
          </div>
        </div>
      </div>
    </div>

    <!--modal end-->
    @push('js')
    <script type="text/javascript">
        function productview(id){
                 $.ajax({
                            url: "{{  url('/cart/product/view/') }}/"+id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                              $('#pname').text(data.product.product_name);
                              $('#pimage').attr('src','../'+data.product.image);
                              $('#pcat').text(data.cat);
                              $('#psubcat').text(data.product.subcategory_name);
                              $('#pcode').text(data.product.sku);
                              $('#product_id').val(data.product.id);
                              if(data.product.stock > 0){
                                  $('#stock').text('Available');
                                }else{
                                  $('#stock').text('Out of Stock');
                                }
                               var d =$('select[name="size"]').empty();
                                $.each(data.size, function(key, value){
                                    $('select[name="size"').append('<option data-id="'+value.id+'" value="'+ value.name +'">' + value.name + '</option>');
                                     if (data.size == "") {
                                            $('#sizediv').hide();
                                     }else{
                                           $('#sizediv').show();
                                     }
                                });
                               var d =$('select[name="color"]').empty();
                                $.each(data.color, function(key, value){
                                    $('select[name="color"').append('<option data-id="'+value.id+'" value="'+ value.name +'">' + value.name + '</option>');
                                      if (data.color == "") {
                                            $('#colordiv').hide();
                                     } else{
                                          $('#colordiv').show();
                                     }
                                });
                    }
             })
           }



            $('select[name="color"]').on('change',function(){
                alert('color_id');
                var color_id = $(this).data("id");
                //$('input[name="color_id"]').val(id)
            })



    </script>
    @endpush

@endsection
