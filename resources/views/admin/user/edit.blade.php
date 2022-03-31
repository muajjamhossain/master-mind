@extends('admin.layouts.app')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Edit User</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="active">Edit User</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update User Information</h3>
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
                             <strong>Success!</strong> user information updated successfully.
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
                      <input type="hidden" name="user" value="{{$data->username}}">
                      <input type="hidden" name="id" value="{{$data->id}}">
                      <input type="text" class="form-control" name="firstname" value="{{$data->firstname}}">
                      <div class="invalid-feedback">@error('firstname') {{ $message }} @enderror</div>

                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Last Name:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="lastname" value="{{$data->lastname}}">
                    </div>
                    <div class="invalid-feedback">@error('lastname') {{ $message }} @enderror</div>

                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Email:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email" value="{{$data->email}}" disabled>
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
                    <div class="col-md-2">
                        @if($data->photo!='')
                            <img class="table_image_100" src="{{URL::to($data->image)}}" alt="photo"/>
                        @else
                            <img class="table_image_100" src="{{asset('public/uploads')}}/avatar-black.png" alt="photo"/>
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
