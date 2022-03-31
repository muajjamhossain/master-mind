@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Team</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Team</a></li>
            <li class="active">View</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Team Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/team')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Team Member</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td>Team Member Name</td>
                                <td>:</td>
                                <td>{{$data->team_name}}</td>
                            </tr>
                            <tr>
                                <td>Team Member Designation</td>
                                <td>:</td>
                                <td>{{$data->team_designation}}</td>
                            </tr>
                            <tr>
                                <td>Team Member Details</td>
                                <td>:</td>
                                <td>{{$data->team_details}}</td>
                            </tr>
                            <tr>
                                <td>Facebook URL</td>
                                <td>:</td>
                                <td>{{$data->team_facebook}}</td>
                            </tr>
                            <tr>
                                <td>Twitter URL</td>
                                <td>:</td>
                                <td>{{$data->team_twitter}}</td>
                            </tr>
                            <tr>
                                <td>Linkedin URL</td>
                                <td>:</td>
                                <td>{{$data->team_linkedin}}</td>
                            </tr>
                            <tr>
                                <td>Pinterest URL</td>
                                <td>:</td>
                                <td>{{$data->team_pinterest}}</td>
                            </tr>
                            <tr>
                                <td>Google URL</td>
                                <td>:</td>
                                <td>{{$data->team_google}}</td>
                            </tr>
                            <tr>
                                <td>Youtube URL</td>
                                <td>:</td>
                                <td>{{$data->team_youtube}}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>:</td>
                                <td>
                                    @if($data->team_photo!='')
                                        <img class="table_image_ban_big" src="{{asset('uploads/team/'.$data->team_photo)}}" alt="image"/>
                                    @else
                                        <img class="table_image_ban_big" src="{{asset('uploads')}}/no-image-big.jpg" alt="image"/>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Time</td>
                                <td>:</td>
                                <td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="#" class="btn btn-secondary waves-effect">PRINT</a>
                <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="#" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection
