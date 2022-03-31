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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category_product', $category->parent->slug) }}">{{ $category->parent->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
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

                                    <h5><a href="{{ route('product_details',$product->slug) }}">{{ Str::limit($product->name , 20 ) }}</a></h5>
                                    <h4><span>৳</span>{{ $product->price ?? $product->discount_price ?? $product->selling_price ?? ""  }}</h4>
                                    <a href="#" class="btn add_card_btn">ADD TO CART</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hot deal part end -->
@endsection
