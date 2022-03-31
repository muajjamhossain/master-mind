<form class="form-horizontal" method="post" action="{{ route('setting.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Basic Information</h3>
                </div>
                <div class="col-md-4 text-right">
                    {{-- <a href="{{url('dashboard/manage/social')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> Social Media</a> --}}
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
                       <strong>Successfully!</strong> update basic information.
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
          <div class="form-group row custom_form_group{{ $errors->has('site_name') ? ' has-error' : '' }}">
              <label class="col-sm-3 control-label">Website Name:<span class="req_star">*</span></label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="site_name" value="{{ config('settings.site_name') }}">
                @if ($errors->has('site_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('site_name') }}</strong>
                    </span>
                @endif
              </div>
          </div>
          <div class="form-group row custom_form_group{{ $errors->has('site_title') ? ' has-error' : '' }}">
              <label class="col-sm-3 control-label">Website Title:<span class="req_star">*</span></label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="site_title" value="{{ config('settings.site_title') }}">
                @if ($errors->has('site_title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('site_title') }}</strong>
                    </span>
                @endif
              </div>
          </div>
          <div class="form-group row custom_form_group{{ $errors->has('site_meta') ? ' has-error' : '' }}">
              <label class="col-sm-3 control-label">Website Meta:<span class="req_star">*</span></label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="site_meta" value="{{ config('settings.site_meta') }}">
                @if ($errors->has('site_meta'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('site_meta') }}</strong>
                    </span>
                @endif
              </div>
          </div>
          <div class="form-group row custom_form_group">
              <label class="col-sm-3 control-label"> Website Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="site_subtitle" value="{{ config('settings.site_subtitle') }}">
              </div>
          </div>
          <div class="form-group row custom_form_group">
              <label class="col-sm-3 control-label">Details:</label>
              <div class="col-sm-7">
                <textarea class="form-control" rows="3" id="" name="site_details">
                    {{ config('settings.site_details') }}
                </textarea>
              </div>
          </div>
          <div class="form-group row custom_form_group">
              <label class="col-sm-3 control-label">Photo:</label>
              <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file btnu_browse">
                            Browse… <input type="file" name="site_image" id="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
                <img id='img-upload'/>
              </div>
              <div class="col-sm-2">
                  <img class="img-thumbnail" src="{{ URL::to(config('settings.site_image')) }}"/>
              </div>

          </div>
          <div class="form-group row custom_form_group">
              <label class="col-sm-3 control-label">Favicon:</label>
              <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file btnu_browse">
                            Browse… <input type="file" name="site_favicon" id="imgInpFavicon">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
                <img id='img-upload-favicon'/>
              </div>
              <div class="col-sm-2">
                  <img class="img-thumbnail basic_favicon_img" src="{{ URL::to(config('settings.site_favicon')) }}"/>
              </div>
          </div>
          <div class="form-group row custom_form_group">
              <label class="col-sm-3 control-label">Logo:</label>
              <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file btnu_browse">
                            Browse… <input type="file" name="site_logo" id="imgInpFlogo">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
                <img id='img-upload-flogo'/>
              </div>
              <div class="col-sm-2">
                  <img class="img-thumbnail" src="{{ URL::to(config('settings.site_logo')) }}"/>
              </div>
          </div>
          <div class="form-group row custom_form_group">
              <label class="col-sm-3 control-label">Footer Logo:</label>
              <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file btnu_browse">
                            Browse… <input type="file" name="site_footer_logo" id="imgInpFlogo">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
                <img id='img-upload-flogo'/>
              </div>
              <div class="col-sm-2">
                  <img class="img-thumbnail" src="{{ URL::to(config('settings.site_footer_logo')) }}"/>
              </div>
          </div>
        </div>
        <div class="card-footer card_footer_button text-center">
            <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
        </div>
    </div>
  </form>
