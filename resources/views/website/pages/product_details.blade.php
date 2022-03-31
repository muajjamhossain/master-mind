@extends('layouts.app')

@section('content')

    <!-- others banner start -->
    <section class="other_page_banner_part" id="other_page_banner_sec">
        <div class="overlay_other_banner_page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="other_page_banner_content">
                            <h1>FOOD & GROCERY</h1>
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
                            <li class="breadcrumb-item"><a href="{{ route('sub_category_product', $product->categories->first()->slug) }}">{{ $product->categories->first()->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end -->

    <!-- cart part start -->
    <section class="cart_part py_100" id="card_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6">
                    <div class="img_zoom_part">
                        <div id="el" class="zoom">
                            <div class="zoom-main">
                                <span class="zoom-mousemove" style="background-image: url($product->image); background-position: 60.2273% 99.5%;"><img src="{{ URL::to($product->image) }}" /></span>
                            </div>
                            <div class="zoom-thumb">
                                @foreach ($product->images as $key => $item)
                                <a class="zoom-click" data-url="{{ URL::to($item->gallery) }}" data-index="{{ $key }}"><img src="{{ URL::to($item->gallery) }}" /></a><a class="zoom-click" data-url="{{ URL::to($item->gallery) }}" data-index="{{ $key }}"><img src="{{ URL::to($item->gallery) }}" /></a>
                                @endforeach
                                {{--  <a class="zoom-click" data-url="images/rice_item3.jpg" data-index="2"><img src="images/rice_item3.jpg" /></a><a class="zoom-click" data-url="images/rice_item4.jpg" data-index="3"><img src="images/rice_item4.jpg" /></a>
                                <a class="zoom-click" data-url="images/rice_item5.jpg" data-index="4"><img src="images/rice_item5.jpg" /></a>  --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-6">
                    <div class="product_card_contnent">
                        <h3>{{ $product->name }}</h3>
                        <h4><span>৳</span>{{ $product->price ?? $product->discount_price ?? $product->selling_price ?? ""  }}</h4>
                        <p>{{ Str::limit($product->description , 190, '...') }}</p>
                        {{--  <div class="rewviews_card">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star star_colo"></i>
                            <span>( 15 customer reviews)</span>
                        </div>  --}}
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Size</label>
                                        <select name="size" id="" class="form-control">
                                            <option value="">Please Select</option>
                                            @foreach ($product->sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Color</label>
                                        <select name="color" id="" class="form-control">
                                            <option value="">Please Select</option>
                                            @foreach ($product->colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="quantity_form_input">
                                <input type="number" value="1" min="0" max="100" step="1">
                            </div>

                            <div class="cart_btn">
                                <button type="submit" class="btn add_card_btn">ADD TO CART</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <h6>Have questions about this product :</h6>
                        <h4><a href="#"><i class="fas fa-phone-alt"></i> 01711- 000 555</a></h4>
                        <div class="fav_cop_btn">
                            <a href="#" class="btn"><i class="fas fa-heart"></i> Add to wishlist</a>
                            <a href="#" class="btn"><i class="fas fa-heart"></i> Compare</a>
                        </div>
                        <h5>Category: <a href="#">Rice</a></h5>
                        <h5>Tag: <a href="#">Rice</a>, <a href="">Minicate</a>, <a href="#">Pran</a>, <a href="">Food</a></h5>
                        <h5>Brand: <a href="#">Pran Food Product LTD.</a></h5>
                        <ul>
                            <li><span>Share: </span></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart part end -->

    <!-- product_dtls_all start -->
    <section class="product_dtls_all_part py_60" id="product_dtls_all_sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_reviwes_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Additional information </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Reviews (15)</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false"> Vendor Info</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact3" aria-selected="false"> More Products</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            </div>
                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_dtls_all end -->


    <section class="releted_product_part py_100" id="releted_product_sec">
        <div class="container">
           <!-- common heding start -->
           <div class="row">
               <div class="col-12">
                   <div class="common_heading text-center common_heading2">
                       <h3>Related Products</h3>
                   </div>
               </div>
           </div>
           <!-- common heding end -->
           @php
               $cat = $product->categories->first();
           @endphp
            <div class="row">
                <div class="col-12">
                    <div class="releted_product_slide owl-carousel">

                        @foreach ($cat->products as $item)

                            <div class="food_grocery_cont_dlt_all text-center">
                                <div class="food_grocery_cont_dlt_all_img">
                                    <img src="{{ URL::to($item->image) }}" alt="" class="img-fluid">
                                    <div class="food_grocery_cont_dlt_all_img_overlay">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a class="venobox" data-gall="gallery01" href="{{ URL::to($item->image) }}"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="">{{ $item->name }}</a></h5>
                                <h4><span>৳</span>{{ $product->price ?? $product->discount_price ?? $product->selling_price ?? ""  }}</h4>
                                <a href="#" class="btn add_card_btn">ADD TO CART</a>
                            </div>
                        @endforeach
                        {{--  <div class="food_grocery_cont_dlt_all text-center">
                            <div class="food_grocery_cont_dlt_all_img">
                                <img src="images/rice_item1.jpg" alt="" class="img-fluid">
                                <div class="food_grocery_cont_dlt_all_img_overlay">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                        <li><a class="venobox" data-gall="gallery01" href="images/rice_item1.jpg"><i class="fas fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h5>Pran Kalijeera Rice – 5kg</h5>
                            <h4><span>৳</span>300.00</h4>
                            <a href="#" class="btn add_card_btn">ADD TO CART</a>
                        </div>
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
                            <h5>Pran Kalijeera Rice – 5kg</h5>
                            <h4><span>৳</span>300.00</h4>
                            <a href="#" class="btn add_card_btn">ADD TO CART</a>
                        </div>
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
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
