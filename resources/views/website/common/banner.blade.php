
@php
$banners =App\Model\Banner::where('status', 1)->orderBy('id', 'DESC')->get();
@endphp
    <!-- banner start -->
    <section class="banner_part" id="banner_sec">
        <div class="banner_slide owl-carousel">
            @foreach ($banners as $banner)
            <div class="banner_slider_item" style="background:url({{ URL::to($banner->image) }});">
                <div class="container">
                    <div class="col-md-6 col-sm-8 col-lg-6">
                        <div class="banner_content">
                            <h1><span>{{ $banner->discount }}%</span>
                                DISCOUNT
                            </h1>
                            <h2>{{ $banner->title }}</h2>
                            <a href="{{ $banner->url }}" class="btn btn_com">{{ $banner->button }}</a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
{{--
            <div class="banner_slider_item" style="background:url({{ asset('public/contents/website/assets')}}/images/banner_slide_item2.jpg);">
                <div class="container">

                    <div class="col-md-6 col-sm-8 col-lg-6">
                        <div class="banner_content banner_content2">
                            <h1><span>20%</span>
                                DIsCOUNT</h1>
                            <h2>Electronic Products</h2>
                            <a href="#" class="btn btn_com">SHOP NOW</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="banner_slider_item" style="background:url({{ asset('public/contents/website/assets')}}/images/banner_slide_item3.jpg);">
                <div class="container">

                    <div class="col-md-6 col-sm-8 col-lg-6">
                        <div class="banner_content">
                            <h1><span>20%</span>
                                DIsCOUNT</h1>
                            <h2>Electronic Products</h2>
                            <a href="#" class="btn btn_com">SHOP NOW</a>
                        </div>
                    </div>

                </div>
            </div> --}}
        </div>
    </section>
    <!-- banner end -->
