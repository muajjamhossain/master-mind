<form class="form-horizontal" method="post" action="{{ route('setting.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Copyright Information</h3>
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
                       <strong>Successfully!</strong> update copyright information.
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
          <div class="form-group row custom_form_group">
              <label class="col-sm-3 control-label">Copyright:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="copywrite_title" value="{{ config('settings.copywrite_title') }}">
              </div>
          </div>
        </div>
        <div class="card-footer card_footer_button text-center">
            <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
        </div>
    </div>
  </form>
