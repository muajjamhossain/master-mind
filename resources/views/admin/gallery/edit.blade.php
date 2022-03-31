@extends('admin.layouts.app')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Gallery</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('galleries') }}">Gallery</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="POST" action="{{route('gallery.update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Gallery Photo</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{route('galleries')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Gallery Photo</a>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> update gallery photo information.
                          </div>
                        @endif
                        @if(Session::has('error'))
                          <div class="alert alert-warning alerterror" role="alert">
                             <strong>Opps!</strong> please try again.
                          </div>
                        @endif
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Gallery Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="title" value="{{$data->title}}">
                      <input type="hidden" name="id" value="{{$data->id}}"/>
                      <input type="hidden" name="slug" value="{{$data->slug}}"/>
                      @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('cate') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Gallery Category:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="cat_id">
                            <option value="">Select Category</option>
                            @foreach($allCate as $cate)
                            <option value="{{$cate->id}}" @if($cate->id==$data->id) selected @endif>{{$cate->name}}</option>
                            @endforeach
                      </select>
                      @if ($errors->has('cate'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('cate') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Upload Photo:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        @if($data->photo!='')
                            <img class="img-thumbnail" src="{{URL::to($data->image)}}" alt="logo"/>
                        @else
                            <img class="img-thumbnail" src="{{asset('public/uploads')}}/no-image-big.jpg" alt="logo"/>
                        @endif
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
