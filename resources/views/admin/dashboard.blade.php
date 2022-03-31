@extends('admin.layouts.app')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Dashboard</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-person"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">01</span>
                Users
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-view-quilt"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">02</span>
                Blog Post
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-contacts"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">01</span>
                Contact Message
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-explore"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">10</span>
                Newsletter Subscribe
            </div>
        </div>
    </div>
</div> <!-- End row-->
@endsection
