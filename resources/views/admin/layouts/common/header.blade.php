<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href={{ route('admin.dashboard')}}" class="logo"><i class="md md-terrain"></i> <span>Creative</span></a>
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <a href="#" class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="hide-phone float-left">
                    <form role="search" class="navbar-form">
                        <input type="text" placeholder="Type here for search..." class="form-control search-bar">
                        <a href="#" class="btn btn-search"><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

            <ul class="nav navbar-right float-right list-inline">
                <li class="d-none d-sm-block">
                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                </li>
                <li class="dropdown d-none d-sm-block">
                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                        <i class="md md-notifications"></i> <span class="badge badge-pill badge-xs badge-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg">
                        <li class="text-center notifi-title">Notification</li>
                        <li class="list-group">
                           <!-- list item-->
                           <a href="javascript:void(0);" class="list-group-item">
                              <div class="media">
                                 <div class="media-left pr-2">
                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                 </div>
                                 <div class="media-body clearfix">
                                    <div class="media-heading">New user registered</div>
                                    <p class="m-0">
                                       <small>You have 10 unread messages</small>
                                    </p>
                                 </div>
                              </div>
                           </a>
                          <a href="javascript:void(0);" class="list-group-item">
                            <small>See all notifications</small>
                          </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown open">
                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('contents/admin')}}/assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle"> </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('dashboard/profile')}}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
