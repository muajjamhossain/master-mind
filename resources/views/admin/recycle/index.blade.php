@extends('admin.layouts.app')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Recycle</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="active">Recycle</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.user')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-person"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$user}}</span>
                  Users
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.banner')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-panorama"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$banner}}</span>
                  Banner
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{ route('recycle.contact') }}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-contacts"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark"></span>
                  Contact Message
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.partner')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-view-carousel"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$partner}}</span>
                  Partner
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.gallery')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-photo-library"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$gallery}}</span>
                  Gallery
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.gallerycategory')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-insert-chart"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$gallerycategory}}</span>
                  Gallery Category
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.team')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-account-box"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$team}}</span>
                  Team Member
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.testimonial')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-local-library"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$testimonial}}</span>
                  Client Testimonial
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.post')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-view-quilt"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$post}}</span>
                  Blog Post
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.blogcategory')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-layers"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$blogcategory}}</span>
                  Blog Category
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{route('recycle.tag')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-now-widgets"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">

                  <span class="counter text-dark">{{$tag}}</span>
                  Blog Tag
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
     <a href="{{ route('recycle.comment') }}">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-forum"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">0</span>
                Post Comments
            </div>
        </div>
     </a>
    </div>
    <div class="col-md-6 col-xl-3">
      <a href="{{ route('recycle.newsletter') }}">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-explore"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">

                <span class="counter text-dark">{{$newsletter}}</span>
                Newsletter Subscribe
            </div>
        </div>
      </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-cloud"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">0</span>
                Demo
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-cloud"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">0</span>
                Demo
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-cloud"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">0</span>
                Demo
            </div>
        </div>
    </div>
</div> <!-- End row-->
@endsection
