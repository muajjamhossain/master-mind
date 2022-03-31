@extends('layouts.app')
@section('content')


    <!-- others banner start -->
    <section class="other_page_banner_part" id="other_page_banner_sec">
        <div class="overlay_other_banner_page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="other_page_banner_content">
                            <h1>Shopping Cart</h1>
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
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end -->


    <section class="cardd_part py_100" id="cardd_sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cardd_content">
                        <div class="cardd_item">
                            <table class="table">
                                <tbody>
                                    <tr class="row">
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-2"><img src="images/shopping_cart1.jpg" alt="shopping_cart1.jpg" class="img-fluid"></td>
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-2">
                                            <p>Name</p>
                                            <h4>MacBook Air 13</h4>
                                        </td>
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-1">
                                            <p>Color</p>
                                            <h4><i class="fas fa-circle"></i>Silver</h4>
                                        </td>
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-2">
                                            <p>Quantity</p>
                                            <div class="quantity_form_input">
                                                <input type="number" value="1" min="0" max="100" step="1">
                                            </div>
                                        </td>
                                        <td class="col-sm-3 col-12 col-md-3 col-lg-2">
                                            <p>Price</p>
                                            <h4>TK 58000</h4>
                                        </td>
                                        <td class="col-sm-3 col-12 col-md-3 col-lg-2">
                                            <p>Total</p>
                                            <h4>TK 58000</h4>
                                        </td>
                                        <td class="col-sm-2 col-12 col-md-2 col-lg-1">
                                            <p>Delete</p>
                                            <h4><a href="#"><i class="fas fa-trash"></i></a></h4>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cardd_item">
                            <table class="table">
                                <tbody>
                                    <tr class="row">
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-2"><img src="images/shopping_cart1.jpg" alt="shopping_cart1.jpg" class="img-fluid"></td>
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-2">
                                            <p>Name</p>
                                            <h4>MacBook Air 13</h4>
                                        </td>
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-1">
                                            <p>Color</p>
                                            <h4><i class="fas fa-circle"></i>Silver</h4>
                                        </td>
                                        <td class="col-sm-4 col-12 col-md-4 col-lg-2">
                                            <p>Quantity</p>
                                            <div class="quantity_form_input">
                                                <input type="number" value="1" min="0" max="100" step="1">
                                            </div>
                                        </td>
                                        <td class="col-sm-3 col-12 col-md-3 col-lg-2">
                                            <p>Price</p>
                                            <h4>TK 58000</h4>
                                        </td>
                                        <td class="col-sm-3 col-12 col-md-3 col-lg-2">
                                            <p>Total</p>
                                            <h4>TK 58000</h4>
                                        </td>
                                        <td class="col-sm-2 col-12 col-md-2 col-lg-1">
                                            <p>Delete</p>
                                            <h4><a href="#"><i class="fas fa-trash"></i></a></h4>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cardd_item_total">
                            <table class="table">
                                <tbody>
                                    <tr class="float-right">
                                        <td>
                                            <p>Total</p>
                                        </td>
                                        <td>
                                            <h4>TK 58000</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cardd_item_total_btn">
                            <ul class="float-right">
                                <li>
                                    <a href="#" class="btn">Add to Cart</a>
                                </li>
                                <li>
                                    <a href="#" class="btn">Add to Cart</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection


