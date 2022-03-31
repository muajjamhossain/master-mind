@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Team</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Team</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/team/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Add Team Member Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/team')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Team</a>
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
                             <strong>Successfully!</strong> add team member information.
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
                    <label class="col-sm-3 control-label">Team Member Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="name" value="{{old('name')}}">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Team Member Designation:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="designation" value="{{old('designation')}}">
                      @if ($errors->has('designation'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('designation') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Team Member Details:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="5" name="details">{{old('details')}}</textarea>
                      @if ($errors->has('details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Social Media Information:</label>
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-md-6 mb-15">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-facebook-square"></i></span></div>
                                    <input type="text" class="form-control" id="" name="facebook" value="{{old('facebook')}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-15">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-twitter-square"></i></span></div>
                                    <input type="text" class="form-control" id="" name="twitter" value="{{old('twitter')}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-15">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-linkedin-square"></i></span></div>
                                    <input type="text" class="form-control" id="" name="linkedin" value="{{old('linkedin')}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-15">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pinterest-square"></i></span></div>
                                    <input type="text" class="form-control" id="" name="pinterest" value="{{old('pinterest')}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-15">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-google-plus-square"></i></span></div>
                                    <input type="text" class="form-control" id="" name="google" value="{{old('google')}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-15">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-youtube-square"></i></span></div>
                                    <input type="text" class="form-control" id="" name="youtube" value="{{old('youtube')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('pic') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Team Member Photo:<span class="req_star">*</span></label>
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
