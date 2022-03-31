<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{asset('public/contents/admin')}}/assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- {{\Auth::user()->fullname }} --}} Super Admin
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('dashboard/profile')}}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                        <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="text-muted m-0">{{'@'. 'Super admin'}}</p>
            </div>
        </div>
        <div id="sidebar-menu">
            <ul>
                <li><a href="{{route('admin.dashboard')}}" class="waves-effect"><i class="md md-home"></i><span>Dashboard </span></a></li>

                <li><a href="{{route('users')}}" class="waves-effect"><i class="md md-account-circle"></i><span>Users </span></a></li>
                <li><a href="{{route('roles')}}" class="waves-effect"><i class="md md-account-circle"></i><span>Roles </span></a></li>


                <li><a href="#" class="waves-effect"><i class="md md-view-list"></i><span>Menu </span></a></li>


                <li><a href="{{route('banners')}}" class="waves-effect"><i class="md md-panorama"></i><span>Banners </span></a></li>


                <li>
                    <a href="{{ route('settings') }}" class="waves-effect"><i class="md md-settings"></i><span>Manage Website</span><span class="pull-right"></span></a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-photo-library"></i><span>Product </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('products')}}">All Product</a></li>
                        <li><a href="{{route('product.type')}}">Add Product</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-photo-library"></i><span>Product Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('categories')}}">All Category</a></li>
                        <li><a href="{{route('category.add')}}">Add Category</a></li>
                        <li><a href="{{route('category.banners')}}">All Category Banner</a></li>
                        <li><a href="{{route('category.banner.add')}}">Add Category Banner</a></li>
                        <li><a href="{{route('categoryads')}}">All Category Ads</a></li>
                        <li><a href="{{route('category.ads.add')}}">Ads Category Ads</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-photo-library"></i><span>Gallery </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('gallery.add')}}">Upload Gallery Photo</a></li>
                        <li><a href="{{route('galleries')}}">All Gallery Photo</a></li>
                        <li><a href="{{route('gallery-categories')}}">Gallery Category</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-view-quilt"></i><span>Blog </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('blogpost.add')}}">Add Post</a></li>
                        <li><a href="{{route('blogposts')}}">All Post</a></li>
                        <li><a href="{{route('blogcategories')}}">All Category</a></li>
                        <li><a href="{{url('dashboard/blog/tag')}}">All Tag</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-storage"></i><span>Visitor Information </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('newsletters')}}">Newsletter Subscribe</a></li>
                    </ul>
                </li>


                <li><a href="{{route('teams')}}" class="waves-effect"><i class="md md-account-box"></i><span>Our Team </span></a></li>


                <li><a href="{{route('partners')}}" class="waves-effect"><i class="md md-view-carousel"></i><span>Our Partners </span></a></li>


                <li><a href="{{route('testimonials')}}" class="waves-effect"><i class="md md-local-library"></i><span>Client Testimonial </span></a></li>


                <li><a href="{{url('dashboard/contactus')}}" class="waves-effect"><i class="md md-contacts"></i><span>Contact Message </span></a></li>


                <li><a href="{{route('recyclebins')}}" class="waves-effect"><i class="md md-delete"></i><span>Recycle Bin </span></a></li>

                <li><a href="{{url('/')}}" class="waves-effect" target="_blank"><i class="md md-public"></i><span>Live Site </span></a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="waves-effect"><i class="md md-settings-power"></i><span>Logout</span></a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
