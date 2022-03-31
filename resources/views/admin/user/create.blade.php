@extends('admin.layouts.app')
@section('title', 'Admin create')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Users</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="active">Create User</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="POST" action="{{route('user.insert')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> User Registration</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{route('users')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All User</a>
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
                             <strong>Success!</strong> user registrion success.
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
                <div class="form-group row custom_form_group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">First Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}">
                      <div class="invalid-feedback">@error('firstname') {{ $message }} @enderror</div>

                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Last Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}">
                      <div class="invalid-feedback">@error('lastname') {{ $message }} @enderror</div>

                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">E-mail:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email" value="{{old('email')}}">
                      <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Phone:<span class="req_star"></span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                      <div class="invalid-feedback">@error('phone') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Password:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" name="password" value="{{old('password')}}">
                      <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Confirm Password:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
                      <div class="invalid-feedback">@error('password_confirmation') {{ $message }} @enderror</div>
                    </div>
                </div>


                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Photo:</label>
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
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">REGISTRATION</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
