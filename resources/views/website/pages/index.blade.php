@extends('layouts.app')
@section('content')

@push('banner')
@include('website.common.banner')
@endpush
    <!-- hot deal part start -->
    <section class="common_deal_part hot_deal_part py_60" id="hot_deal_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-5 col-lg-3">
                    <div class="common_deal_nav_site">
                        <h5>HOT DEALS <i class="fas fa-angle-down"></i></h5>
                        <ul>
                            <li><a href="#">Special Offers<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Combo Offers<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Best Offers<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Day Offers<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Upcoming Offers<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-7 col-lg-9">
                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-lg-8 mmt_30">
                            <div class="hot_deal_add1">
                                <div class="hot_deal_add1_img">
                                    <img src="{{ asset('public/contents/website/assets')}}/images/hot_deal_img1.jpg" alt="" class="img-fluid">
                                    <div class="hot_deal_add1_content">
                                        <h6>30% off</h6>
                                        <h4>COVID-19</h4>
                                        <h4>Safty Products</h4>
                                        <a href="#">BUY NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-4 mmt_30 smt_30">
                            <div class="hot_deal_add2">
                                <div class="hot_deal_add2_img">
                                    <img src="{{ asset('public/contents/website/assets')}}/images/hot_deal_img2.jpg" alt="" class="img-fluid">
                                    <div class="hot_deal_add1_content hot_deal_add2_content">
                                        <h6>25% off</h6>
                                        <h4>Mobile </h4>
                                        <h4>Accessories</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hot deal part end -->
    @php



    $categories = App\Model\Category::where('status',1)->where('parent_id',1)->get();
    @endphp
    @foreach ($categories as $category)

    <!-- section_separet start -->
    <section class="section_separet" style="background: url({{ $category->banner->image ?? ''}})">
        <div class="container">
            <div class="row">
                @if ($category->banner != null)
                <div class="col-md-12">
                    @if ($category->banner->check_content != 1)
                    <div class="section_chaparet_content text-center">
                        <h3>{{ $category->banner->discount ?? '' }}% OFF</h3>
                        <a href="{{ $category->banner->url ?? "" }}" class="btn">{{ $category->banner->button ?? "" }}</a>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- section_separet end -->

    <!-- FOOD & GROCERY part start -->


    <section class="common_deal_part food_grocery_part py_60" id="food_grocery_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-12">
                    <div class="common_heading">
                        <h3>{{ $category->name }}</h3>
                    </div>
                </div>
            </div>
            <!-- common heading start -->
            <div class="row">
                <div class="col-md-3 col-sm-4 col-lg-3">
                    <div class="common_deal_nav_site">
                        <h5>{{ $category->name }} <i class="fas fa-angle-down"></i></h5>
                        <ul>
                            @foreach ($category->children as $item)
                            <li><a href="{{ route('sub_category_product',$item->slug) }}">{{ $item->name }}<i class="fas fa-arrow-right"></i></a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-lg-9 mmt_30">
                    <div class="food_grocery_cont">
                        <div class="row mx-7_5">
                            @foreach ($category->children as $item)
                                <div class="col-md-3 col-lg-3 col-sm-6 col-12">
                                    <div class="food_grocery_cont_dlt">
                                        <div class="food_grocery_cont_dlt_img">
                                            <img src="{{ URL::to($item->image) }}" alt="" class="img-fluid">
                                            <div class="food_grocery_cont_dlt_cont">
                                                <h4><a href="{{ route('sub_category_product',$item->slug) }}">{{ $item->name }}<i class="fas fa-arrow-right"></i></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-7_5">
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/food_gor_add_img1.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content">
                                            <h5>Order 2000Taka</h5>
                                            <h4>free delivery</h4>
                                            <a href="#" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/food_gor_add_img2.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content food_grocery_cont_add_content2">
                                            <h5>50% OFF</h5>
                                            <h4>fruits &<br>
                                                vegetables</h4>
                                            <a href="#" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endforeach


    <!-- hot deal part end -->

    <!-- section_separet start -->
    {{-- <section class="section_separet2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-2 col-sm-11 offset-sm-1">
                    <div class="section_chaparet_content">
                        <h3>50% OFF</h3>
                        <h5>ALL SMART DEVICES</h5>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- section_separet end -->


    <!-- FOOD & GROCERY part start -->
    {{-- <section class="common_deal_part food_grocery_part py_60" id="food_grocery_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-12">
                    <div class="common_heading">
                        <h3>DISCOVER OUR ELECTRONICS ITEMS</h3>
                    </div>
                </div>
            </div>
            <!-- common heading start -->
            <div class="row">
                <div class="col-md-3 col-sm-4 col-lg-3">
                    <div class="common_deal_nav_site">
                        <h5>ELECTRONICS <i class="fas fa-angle-down"></i></h5>
                        <ul>
                            <li><a href="#">Mobile<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Smart Devices<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Television<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Laptops<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Monitors<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Mouse<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Keyboard<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Headphons<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Refrigerator<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Others<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8 col-lg-9 mmt_30">
                    <div class="food_grocery_cont">
                        <div class="row mx-7_5">
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item1.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Mobile <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item2.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Smart Devices <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15 smmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item3.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Television <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15 smmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item4.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Laptops <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item5.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Monitors <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item6.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Mouse<i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item7.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Keyboard <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/electonic_item8.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Headphons <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-7_5">
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/sec_add_img4.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content food_grocery_cont_add_content3 text-center">
                                            <h5>FLASH SALE</h5>
                                            <h4>UP TO 40% discount</h4>
                                            <h6>ALL MOBILE PHONES</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/sec_add_img5.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content food_grocery_cont_add_content4">
                                            <h5>computer<br>
                                                accessories</h5>
                                            <h4>50% OFF</h4>
                                            <a href="#" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- hot deal part end -->

    <!-- section_separet start -->
    {{-- <section class="section_separet3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_chaparet_content text-center">
                        <h3>MEN‘S fashion</h3>
                        <h6>Collection</h6>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- section_separet end -->


    <!-- FOOD & GROCERY part start -->
    {{-- <section class="common_deal_part food_grocery_part py_60" id="food_grocery_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-12">
                    <div class="common_heading">
                        <h3>DISCOVER MEN'S FASHION</h3>
                    </div>
                </div>
            </div>
            <!-- common heading start -->
            <div class="row">
                <div class="col-md-3 col-sm-4 col-lg-3">
                    <div class="common_deal_nav_site">
                        <h5>MEN'S FASHION<i class="fas fa-angle-down"></i></h5>
                        <ul>
                            <li><a href="#">Shirts<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">T-Shirts<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Pants<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Belts<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Watch<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Sunglass<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Footware<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Panjabi<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Accessories<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Others<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8 col-lg-9 mmt_30">
                    <div class="food_grocery_cont">
                        <div class="row mx-7_5">
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img1.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Shirts <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img2.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">T-Shirts<i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15 smmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img3.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Pants <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15 smmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img4.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Belts <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img5.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Watch <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img6.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Sunglass<i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img7.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Footware <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/men_col_img8.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Panjabi <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-7_5">
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/sec_add_img6.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content food_grocery_cont_add_content5">
                                            <h5>Few Accessories</h5>
                                            <h4>Every Man</h4>
                                            <h6>Must Wear</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/sec_add_img7.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content food_grocery_cont_add_content6">
                                            <h5>Men’s<br>
                                                Office Bag</h5>
                                            <h4>$9.99 Only</h4>
                                            <a href="#" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- hot deal part end -->


    <!-- section_separet start -->
    {{-- <section class="section_separet4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_chaparet_content text-center">

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- section_separet end -->


    <!-- FOOD & GROCERY part start -->
    {{-- <section class="common_deal_part food_grocery_part py_60" id="food_grocery_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-12">
                    <div class="common_heading">
                        <h3>DISCOVER WOMEN'S FASHION</h3>
                    </div>
                </div>
            </div>
            <!-- common heading start -->
            <div class="row">
                <div class="col-md-3 col-sm-4 col-lg-3">
                    <div class="common_deal_nav_site">
                        <h5>WOMEN'S FASHION<i class="fas fa-angle-down"></i></h5>
                        <ul>
                            <li><a href="#">Saree<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Salwar kameez<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Gowns<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Tops<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Cosmatics <i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Jewelry <i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Footware<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Watchs<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Accessories<i class="fas fa-arrow-right"></i></a></li>
                            <li><a href="#">Others<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8 col-lg-9  mmt_30">
                    <div class="food_grocery_cont">
                        <div class="row mx-7_5">
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img1.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Saree <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img2.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Salwar kameez<i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15 smmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img3.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Gowns <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mmt_15 smmt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img4.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Tops <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img5.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Cosmatics <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img6.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Jewelry<i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img7.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Footware <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-12 mt_15">
                                <div class="food_grocery_cont_dlt">
                                    <div class="food_grocery_cont_dlt_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/women_col-img8.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_dlt_cont">
                                            <h4><a href="#">Watchs <i class="fas fa-arrow-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-7_5">
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/sec_add_img8.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content food_grocery_cont_add_content7 text-center">
                                            <h5>Few Accessories</h5>
                                            <h4>Every Women</h4>
                                            <h6>Must Wear</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt_15">
                                <div class="food_grocery_cont_add">
                                    <div class="food_grocery_cont_add_img">
                                        <img src="{{ asset('public/contents/website/assets')}}/images/sec_add_img10.jpg" alt="" class="img-fluid">
                                        <div class="food_grocery_cont_add_content food_grocery_cont_add_content8 text-center">
                                            <h5>WoMen’s Shoe</h5>
                                            <h4>$9.99 Only</h4>
                                            <a href="#" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- hot deal part end -->



@endsection

