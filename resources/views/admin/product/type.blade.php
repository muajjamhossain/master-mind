
@extends('admin.layouts.app')
@section('title','Product Type')
@section('css')
<style>
    .icon{
        width: 100px;
        height: 100px;
        line-height: 100px;
        border-radius: 50%;
        display: inline-block;
        font-size: 40px;
        color: #fff;
        background: #2d32744d;
    }
    a #icons:hover{
        transform: rotateY(100deg);
    }
    .title{
        color: #fff;
        font-size: 20px;
    }
</style>
@endsection
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product Type</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li class="active">Type</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="float-left">Product Type</h3> <br>
        <hr>

            <div class="product_type" style="padding: 30px; display:flex;">
                <div class="col-md-4">
                    <a href="{{ route('product.physical.add') }}">
                        <div class="cat-box box1" style="padding: 40px; text-align:center; background-color:#724ef8">
                            <div class="icon"> <i id="icons" class="fas fa-tshirt"></i>
                            </div>
                            <h5 class="title">Physical </h5>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('product.digital.add') }}">
                        <div class="cat-box box1" style="padding: 40px; text-align:center;background-color:#fc6f5f">
                            <div class="icon"> <i id="icons" class="fas fa-camera-retro"></i>
                            </div>
                            <h5 class="title">Digital </h5>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('product.license.add') }}">
                        <div class="cat-box box1" style="padding: 40px; text-align:center; background-color:#396ef6">
                            <div class="icon"> <i id="icons" class="fas fa-award"></i>
                            </div>
                            <h5 class="title">License </h5>
                        </div>
                    </a>
                </div>

            </div>

    </div>
</div>


@endsection
@section('js')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
@endsection



