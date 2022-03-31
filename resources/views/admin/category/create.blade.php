@extends('admin.layouts.app')
@section('title','Add Category')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Category</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('categories') }}">categories</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="POST" action="{{route('category.insert')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Add category Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{route('banners')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All category</a>
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
                             <strong>Successfully!</strong> upload category information.
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
                <div class="form-group row custom_form_group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Category Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="name" value="{{old('name')}}">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Description:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="description" value="{{old('description')}}">
                    </div>
                </div>
                <div class="form-group row custom_form_group {{ $errors->has('parrent_id') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Parent Category:</label>
                    <div class="col-sm-7">
                        <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                            <option value="0">Select a parent category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $key }}"> {{ $category }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('parrent_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('parrent_id') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7">
                        <input class="form-check-input" type="checkbox" value="1" id="featured" name="featured"/>Featured Category
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7">
                        <input class="form-check-input" type="checkbox" value="1" id="menu" name="menu"/>Show in Menu
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Banner Image:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      @if ($errors->has('image'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('image') }}</strong>
                          </span>
                      @endif
                      <img id='img-upload'/>
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">UPLOAD</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
