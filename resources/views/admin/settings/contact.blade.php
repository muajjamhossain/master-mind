<form class="form-horizontal" method="post" action="{{route('setting.update')}}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Contact Information</h3>
                </div>
                <div class="col-md-4 text-right">
                    {{-- <a href="{{url('dashboard/manage/social')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> Social Media</a> --}}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body card_form">
          <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                  @if(Session::has('success'))
                    <div class="alert alert-success alertsuccess" role="alert">
                       <strong>Successfully!</strong> update contact information.
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
          <div class="form-group row">
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                      <input type="text" class="form-control" id="" name="phone1" value="{{ config('settings.phone1') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                      <input type="text" class="form-control" id="" name="phone2" value="{{ config('settings.phone2') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                      <input type="text" class="form-control" id="" name="phone3" value="{{ config('settings.phone3') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                      <input type="text" class="form-control" id="" name="phone4" value="{{ config('settings.phone4') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                      <input type="text" class="form-control" id="" name="email1" value="{{ config('settings.email1') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                      <input type="text" class="form-control" id="" name="email2" value="{{ config('settings.email2') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                      <input type="text" class="form-control" id="" name="email3" value="{{ config('settings.email3') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                      <input type="text" class="form-control" id="" name="email4" value="{{ config('settings.email4') }}">
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
                      <textarea class="form-control" rows="2" id="" name="address1" placeholder="Address">{{ config('settings.address1') }}</textarea>
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
                      <textarea class="form-control" rows="2" id="" name="address2" placeholder="Address">{{ config('settings.address2') }}</textarea>
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
                      <textarea class="form-control" rows="2" id="" name="address3" placeholder="Address">{{ config('settings.address3') }}</textarea>
                  </div>
              </div>
              <div class="col-md-6 mb-15">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
                      <textarea class="form-control" rows="2" id="" name="address4" placeholder="Address">{{ config('settings.address4') }}</textarea>
                  </div>
              </div>
          </div>
        </div>
        <div class="card-footer card_footer_button text-center">
            <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
        </div>
    </div>
  </form>
