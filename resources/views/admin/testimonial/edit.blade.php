@extends('admin.layouts.app')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Testimonial</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('testimonials') }}">Testimonial</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{route('testimonial.update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Client Testimonial Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{route('testimonials')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Testimonial</a>
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
                             <strong>Successfully!</strong> update testimonial information.
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
                    <label class="col-sm-3 control-label">Client Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="hidden" name="id" value="{{$data->id}}"/>
                      <input type="hidden" name="slug" value="{{$data->slug}}"/>
                      <input type="text" class="form-control" name="name" value="{{$data->name}}">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Client Designation:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="designation" value="{{$data->designation}}">
                      @if ($errors->has('designation'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('designation') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('company') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Company/Organization:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="company" value="{{$data->company}}">
                      @if ($errors->has('company'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('company') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('review') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Client Review:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="5" name="review">{{$data->review}}</textarea>
                      @if ($errors->has('review'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('review') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('pic') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Image:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="pic" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      @if ($errors->has('pic'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('pic') }}</strong>
                          </span>
                      @endif
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        @if($data->image!='')
                            <img class="img-thumbnail" src="{{URL::to($data->image)}}" alt="image"/>
                        @else
                            <img class="img-thumbnail" src="{{asset('public/uploads')}}/no-image-big.jpg" alt="image"/>
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
