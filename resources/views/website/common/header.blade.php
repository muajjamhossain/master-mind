 <!-- header start -->
 <header>
    <section class="header_top_part" id="header_top_sec">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-sm-8 col-lg-6">
                    <div class="header_top_content">
                        <ul>
                            <li><a href="#"><i class="fas fa-phone-alt"></i> +880 1711 999 222</a></li>
                            <li><a href="#">+880 1711 999 223</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-4 col-lg-6">
                    <div class="header_top_content header_top_content2">
                        <ul class="float-right">
                            <li><a href="#">Sign in </a></li>
                            <li><a href="#">Sign up</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bor-der_bt1"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="header_middle_part" id="header_middle_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-lg-4">
                    <div class="header_middle_logo">
                        <a href="index.html">
                            <img src="images/logo.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="header_middle_form">
                        <form>
                            <div class="row">
                                <div class="col-10">
                                    <input type="search" class="form-control" placeholder="Search Products....">
                                </div>
                                <div class="col-1 px-0">
                                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-2">
                    <div class="header_middle_add_card">
                        <a href="#"><i class="fas fa-shopping-cart"></i>BDT 0.00 <span>0</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- menu part start -->
    <section class="menu_part_ec">
        <div class="main_menu_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-5 col-12 col-sm-7">
                        @php
                            $categories = App\Model\Category::where('status',1)->where('parent_id',1)->get();
                        @endphp
                        <div class="categories_menu categories_four">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Browse Categories <i class="fas fa-align-justify"></i></h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>

                                    @foreach ($categories  as $key => $category)
                                    <li class="menu_item_children"><a href="{{ route('category_product',$category->slug) }}">{{ $category->name }}<i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                                @foreach ($category->children as $key => $child)
                                                <li class="menu_item_children" style="">
                                                    <a href="{{ route('sub_category_product', $child->slug) }}"> {{ $child->name }}
                                                        <i class="fa fa-angle-right"></i>
                                                        <ul>
                                                            @foreach ($child->children as $key => $childtwo)
                                                            <li><a href="{{ route('child_category_product',$childtwo->slug) }}">{{ $childtwo->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </a>
                                                </li>
                                                @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    {{-- <li class="menu_item_children"><a href="#"> Baby &amp; kid&#039;s <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            <li class="menu_item_children" style="">
                                                <a href="#">BOY&#039;S CLOTHING
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">T-Shirt</a></li>
                                                    <li><a href="#">Shirt</a></li>
                                                    <li><a href="#">Panjabi</a></li>
                                                    <li><a href="#">Boy&#039;s Pants</a></li>
                                                    <li><a href="#">Jersey</a></li>
                                                    <li><a href="#">Boys School Dress</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">GIRL&#039;S CLOTHING
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Boys School Dress</a></li>
                                                    <li><a href="#">Girl&#039;s Dresses</a></li>
                                                    <li><a href="#">Girls Pants</a></li>
                                                    <li><a href="#">Girls School Dress</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">TOYS
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Indoor Toys</a></li>
                                                    <li><a href="#">Outdoor Toys</a></li>
                                                    <li><a href="#">Sport Toys</a></li>
                                                    <li><a href="#">Gun Toys</a></li>
                                                    <li><a href="#">Rocker Toys</a></li>
                                                    <li><a href="#">Remote Control Toys</a></li>
                                                    <li><a href="#">Baby Chair &amp; Table</a></li>
                                                    <li><a href="#">Science Kits</a></li>
                                                    <li><a href="#">Baby Walkers</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">KIDS FOOTWEAR
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Boys Footwear</a></li>
                                                    <li><a href="#">Girls Footwear</a></li>
                                                    <li><a href="#">Baby Footwear</a></li>
                                                    <li><a href="#">Socks</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">BACKPACK
                                                    <i class=""></i>
                                                </a>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">PARTY SUPPLIES
                                                    <i class=""></i>
                                                </a>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">BABY FOOD
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Baby Milk</a></li>
                                                    <li><a href="#">Baby Cereal</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">BABY CARE
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Skin Care</a></li>
                                                    <li><a href="#">Hair Care</a></li>
                                                    <li><a href="#">Diapering &amp; Potty Training</a></li>
                                                    <li><a href="#">Health &amp; Safety</a></li>
                                                    <li><a href="#">Baby Grooming</a></li>
                                                    <li><a href="#">Baby Bathing Accessories</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">NURSING &amp; FEEDING
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Baby Feeding Bottle</a></li>
                                                    <li><a href="#">Nipple</a></li>
                                                    <li><a href="#">Water Bottle, Flask &amp; Glass</a></li>
                                                    <li><a href="#">Teether, Pacifier &amp; Spoon</a></li>
                                                    <li><a href="#">Baby Plate, Bowl &amp; Jar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Dining <i class=""></i></a>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Electronics <i class=""></i></a>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Food &amp; Grocery <i class=""></i></a>
                                    </li>


                                    <li class="menu_item_children"><a href="#"> Medicine <i class=""></i></a>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Men&#039;s <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            <li class="menu_item_children" style="">
                                                <a href="#">CLOTHING
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-Shirt</a></li>
                                                    <li><a href="#">Polo Shirts</a></li>
                                                    <li><a href="#">Panjabi</a></li>
                                                    <li><a href="#">Pants</a></li>
                                                    <li><a href="#">Short Pants &amp; Cargos</a></li>
                                                    <li><a href="#">Shorts</a></li>
                                                    <li><a href="#">Lungi</a></li>
                                                    <li><a href="#">Vests</a></li>
                                                    <li><a href="#">Caps &amp; Hats</a></li>
                                                    <li><a href="#">Jersey</a></li>
                                                    <li><a href="#">Waist Coat</a></li>
                                                    <li><a href="#">Raincoats &amp; Shoe Covers</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">GEN&#039;S WATCH
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Original Watch</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">MEN&#039;S FOOTWEAR
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Sandals &amp; Flip-Flops</a></li>
                                                    <li><a href="#">Formal Shoes</a></li>
                                                    <li><a href="#">Casual Shoes</a></li>
                                                    <li><a href="#">Sports Shoes</a></li>
                                                    <li><a href="#">Boots</a></li>
                                                    <li><a href="#">Converse &amp; Sneakers</a></li>
                                                    <li><a href="#">Loafers</a></li>
                                                    <li><a href="#">Shoe Care</a></li>
                                                    <li><a href="#">Socks</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">FRAGRANCES
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Perfume</a></li>
                                                    <li><a href="#">Body Mist</a></li>
                                                    <li><a href="#">Deodorant</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">GROOMING &amp; WELLNESS
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Skin Care</a></li>
                                                    <li><a href="#">Hair Care</a></li>
                                                    <li><a href="#">Body Care</a></li>
                                                    <li><a href="#">Shaving Needs</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">MEN&#039;S ACCESSORIES
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Belts</a></li>
                                                    <li><a href="#">Wallets</a></li>
                                                    <li><a href="#">Backpack</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Women&#039;s <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            <li class="menu_item_children" style="">
                                                <a href="#">CLOTHING
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Saree</a></li>
                                                    <li><a href="#">Salwar Kameez</a></li>
                                                    <li><a href="#">Kurti</a></li>
                                                    <li><a href="#">Gowns</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-Shirt</a></li>
                                                    <li><a href="#">Lehengas</a></li>
                                                    <li><a href="#">Tops</a></li>
                                                    <li><a href="#">Leggings</a></li>
                                                    <li><a href="#">Palazzo</a></li>
                                                    <li><a href="#">Pajamas</a></li>
                                                    <li><a href="#">Pants</a></li>
                                                    <li><a href="#">Bra</a></li>
                                                    <li><a href="#">Panties</a></li>
                                                    <li><a href="#">Lingerie Set</a></li>
                                                    <li><a href="#">Nightwears</a></li>
                                                    <li><a href="#">Women&#039;s Caps &amp; Hats</a></li>
                                                    <li><a href="#">Abayas &amp; Burqas</a></li>
                                                    <li><a href="#">Koti &amp; Jackets</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">JEWELRY
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Earring</a></li>
                                                    <li><a href="#">Anklet</a></li>
                                                    <li><a href="#">Bangles</a></li>
                                                    <li><a href="#">Bracelet</a></li>
                                                    <li><a href="#">Finger Ring</a></li>
                                                    <li><a href="#">Necklace</a></li>
                                                    <li><a href="#">Jewelry Set</a></li>
                                                    <li><a href="#">Brooches</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">FASHION ACCESSORIES
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Purse &amp; Wallets</a></li>
                                                    <li><a href="#">Handbags</a></li>
                                                    <li><a href="#">Backpack</a></li>
                                                    <li><a href="#">Mirror &amp; Comb</a></li>
                                                    <li><a href="#">Hair Band &amp; Clips</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">BEAUTY &amp; CARE
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Body Mist</a></li>
                                                    <li><a href="#">Deodorant</a></li>
                                                    <li><a href="#">Skin Care</a></li>
                                                    <li><a href="#">Hair Care</a></li>
                                                    <li><a href="#">Makeup</a></li>
                                                    <li><a href="#">Personal Care Kits &amp; Accessories</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">FOOTWEAR
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Sandals &amp; Flip-Flops</a></li>
                                                    <li><a href="#">Flat Sandal</a></li>
                                                    <li><a href="#">Heel</a></li>
                                                    <li><a href="#">Party Shoe</a></li>
                                                    <li><a href="#">Casual Shoes</a></li>
                                                    <li><a href="#">Socks</a></li>
                                                    <li><a href="#">Sports Shoes</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children" style="">
                                                <a href="#">WATCHES
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                                <ul>
                                                    <li><a href="#">Original Watch</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7 col-12 col-sm-5">
                        <div class="main_menu menu_position sticky_header_right">
                            <nav class="navbar navbar-expand-lg navbar-light menu_orter">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto menu_or">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">PRODUCTS</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">OFFERS</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">SHOP</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">BRANDS</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">BLOG</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">CONTACT</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header bottom end-->


    <!--sticky header area start-->
    <div class="sticky_header_area sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <!--<div class="col-lg-3 col-sm-3">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>-->
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-5 col-lg-3 col-12 col-sm-7">
                            <div class="categories_menu ">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">Browse Categories <i class="fas fa-align-justify"></i></h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                    @foreach ($categories  as $key => $category)
                                    <li class="menu_item_children"><a href="{{ route('category_product',$category->slug) }}">{{ $category->name }}<i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                                @foreach ($category->children as $key => $child)
                                                <li class="menu_item_children" style="">
                                                    <a href="{{ route('sub_category_product', $child->slug) }}"> {{ $child->name }}
                                                        <i class="fa fa-angle-right"></i>
                                                        <ul>
                                                            @foreach ($child->children as $key => $childtwo)
                                                            <li><a href="{{ route('child_category_product',$childtwo->slug) }}">{{ $childtwo->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </a>
                                                </li>
                                                @endforeach
                                        </ul>
                                    </li>
                                    @endforeach

                                        {{-- <li class="menu_item_children"><a href="#"> Baby &amp; kid&#039;s <i class="fa fa-angle-right"></i></a>
                                            <ul class="categories_mega_menu">
                                                <li class="menu_item_children" style="">
                                                    <a href="#">BOY&#039;S CLOTHING
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">T-Shirt</a></li>
                                                        <li><a href="#">Shirt</a></li>
                                                        <li><a href="#">Panjabi</a></li>
                                                        <li><a href="#">Boy&#039;s Pants</a></li>
                                                        <li><a href="#">Jersey</a></li>
                                                        <li><a href="#">Boys School Dress</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">GIRL&#039;S CLOTHING
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Boys School Dress</a></li>
                                                        <li><a href="#">Girl&#039;s Dresses</a></li>
                                                        <li><a href="#">Girls Pants</a></li>
                                                        <li><a href="#">Girls School Dress</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">TOYS
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Indoor Toys</a></li>
                                                        <li><a href="#">Outdoor Toys</a></li>
                                                        <li><a href="#">Sport Toys</a></li>
                                                        <li><a href="#">Gun Toys</a></li>
                                                        <li><a href="#">Rocker Toys</a></li>
                                                        <li><a href="#">Remote Control Toys</a></li>
                                                        <li><a href="#">Baby Chair &amp; Table</a></li>
                                                        <li><a href="#">Science Kits</a></li>
                                                        <li><a href="#">Baby Walkers</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">KIDS FOOTWEAR
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Boys Footwear</a></li>
                                                        <li><a href="#">Girls Footwear</a></li>
                                                        <li><a href="#">Baby Footwear</a></li>
                                                        <li><a href="#">Socks</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">BACKPACK
                                                        <i class=""></i>
                                                    </a>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">PARTY SUPPLIES
                                                        <i class=""></i>
                                                    </a>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">BABY FOOD
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Baby Milk</a></li>
                                                        <li><a href="#">Baby Cereal</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">BABY CARE
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Skin Care</a></li>
                                                        <li><a href="#">Hair Care</a></li>
                                                        <li><a href="#">Diapering &amp; Potty Training</a></li>
                                                        <li><a href="#">Health &amp; Safety</a></li>
                                                        <li><a href="#">Baby Grooming</a></li>
                                                        <li><a href="#">Baby Bathing Accessories</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">NURSING &amp; FEEDING
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Baby Feeding Bottle</a></li>
                                                        <li><a href="#">Nipple</a></li>
                                                        <li><a href="#">Water Bottle, Flask &amp; Glass</a></li>
                                                        <li><a href="#">Teether, Pacifier &amp; Spoon</a></li>
                                                        <li><a href="#">Baby Plate, Bowl &amp; Jar</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Dining <i class=""></i></a>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Electronics <i class=""></i></a>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Food &amp; Grocery <i class=""></i></a>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Food &amp; Stationary <i class=""></i></a>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Kitchen <i class=""></i></a>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Medicine <i class=""></i></a>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Men&#039;s <i class="fa fa-angle-right"></i></a>
                                            <ul class="categories_mega_menu">
                                                <li class="menu_item_children" style="">
                                                    <a href="#">CLOTHING
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Shirts</a></li>
                                                        <li><a href="#">T-Shirt</a></li>
                                                        <li><a href="#">Polo Shirts</a></li>
                                                        <li><a href="#">Panjabi</a></li>
                                                        <li><a href="#">Pants</a></li>
                                                        <li><a href="#">Short Pants &amp; Cargos</a></li>
                                                        <li><a href="#">Shorts</a></li>
                                                        <li><a href="#">Lungi</a></li>
                                                        <li><a href="#">Vests</a></li>
                                                        <li><a href="#">Caps &amp; Hats</a></li>
                                                        <li><a href="#">Jersey</a></li>
                                                        <li><a href="#">Waist Coat</a></li>
                                                        <li><a href="#">Raincoats &amp; Shoe Covers</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">GEN&#039;S WATCH
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Original Watch</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">MEN&#039;S FOOTWEAR
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Sandals &amp; Flip-Flops</a></li>
                                                        <li><a href="#">Formal Shoes</a></li>
                                                        <li><a href="#">Casual Shoes</a></li>
                                                        <li><a href="#">Sports Shoes</a></li>
                                                        <li><a href="#">Boots</a></li>
                                                        <li><a href="#">Converse &amp; Sneakers</a></li>
                                                        <li><a href="#">Loafers</a></li>
                                                        <li><a href="#">Shoe Care</a></li>
                                                        <li><a href="#">Socks</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">FRAGRANCES
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Perfume</a></li>
                                                        <li><a href="#">Body Mist</a></li>
                                                        <li><a href="#">Deodorant</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">GROOMING &amp; WELLNESS
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Skin Care</a></li>
                                                        <li><a href="#">Hair Care</a></li>
                                                        <li><a href="#">Body Care</a></li>
                                                        <li><a href="#">Shaving Needs</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">MEN&#039;S ACCESSORIES
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Belts</a></li>
                                                        <li><a href="#">Wallets</a></li>
                                                        <li><a href="#">Backpack</a></li>
                                                        <li><a href="#">Bags</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Service <i class=""></i></a>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> Women&#039;s <i class="fa fa-angle-right"></i></a>
                                            <ul class="categories_mega_menu">
                                                <li class="menu_item_children" style="">
                                                    <a href="#">CLOTHING
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Saree</a></li>
                                                        <li><a href="#">Salwar Kameez</a></li>
                                                        <li><a href="#">Kurti</a></li>
                                                        <li><a href="#">Gowns</a></li>
                                                        <li><a href="#">Shirts</a></li>
                                                        <li><a href="#">T-Shirt</a></li>
                                                        <li><a href="#">Lehengas</a></li>
                                                        <li><a href="#">Tops</a></li>
                                                        <li><a href="#">Leggings</a></li>
                                                        <li><a href="#">Palazzo</a></li>
                                                        <li><a href="#">Pajamas</a></li>
                                                        <li><a href="#">Pants</a></li>
                                                        <li><a href="#">Bra</a></li>
                                                        <li><a href="#">Panties</a></li>
                                                        <li><a href="#">Lingerie Set</a></li>
                                                        <li><a href="#">Nightwears</a></li>
                                                        <li><a href="#">Women&#039;s Caps &amp; Hats</a></li>
                                                        <li><a href="#">Abayas &amp; Burqas</a></li>
                                                        <li><a href="#">Koti &amp; Jackets</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">JEWELRY
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Earring</a></li>
                                                        <li><a href="#">Anklet</a></li>
                                                        <li><a href="#">Bangles</a></li>
                                                        <li><a href="#">Bracelet</a></li>
                                                        <li><a href="#">Finger Ring</a></li>
                                                        <li><a href="#">Necklace</a></li>
                                                        <li><a href="#">Jewelry Set</a></li>
                                                        <li><a href="#">Brooches</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">FASHION ACCESSORIES
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Purse &amp; Wallets</a></li>
                                                        <li><a href="#">Handbags</a></li>
                                                        <li><a href="#">Backpack</a></li>
                                                        <li><a href="#">Mirror &amp; Comb</a></li>
                                                        <li><a href="#">Hair Band &amp; Clips</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">BEAUTY &amp; CARE
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Body Mist</a></li>
                                                        <li><a href="#">Deodorant</a></li>
                                                        <li><a href="#">Skin Care</a></li>
                                                        <li><a href="#">Hair Care</a></li>
                                                        <li><a href="#">Makeup</a></li>
                                                        <li><a href="#">Personal Care Kits &amp; Accessories</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">FOOTWEAR
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Sandals &amp; Flip-Flops</a></li>
                                                        <li><a href="#">Flat Sandal</a></li>
                                                        <li><a href="#">Heel</a></li>
                                                        <li><a href="#">Party Shoe</a></li>
                                                        <li><a href="#">Casual Shoes</a></li>
                                                        <li><a href="#">Socks</a></li>
                                                        <li><a href="#">Sports Shoes</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children" style="">
                                                    <a href="#">WATCHES
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <ul>
                                                        <li><a href="#">Original Watch</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-9 col-12 col-sm-5">
                            <div class="sticky_header_right menu_position">

                                <nav class="navbar navbar-expand-lg navbar-light menu_orter">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto menu_or">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">PRODUCTS</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">OFFERS</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">SHOP</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">BRANDS</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">BLOG</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">CONTACT</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sticky header area end-->
</header>
<!-- header end -->
