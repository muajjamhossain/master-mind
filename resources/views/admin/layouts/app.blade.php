<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="" name="description" />
        <meta content="Uzzal" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="{{ asset('public/contents/admin') }}/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{asset('public/contents/admin')}}/assets/images/favicon_1.ico">
        <link href="{{asset('public/contents/admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/contents/admin')}}/assets/css/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/contents/admin')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/contents/admin')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/contents/admin')}}/assets/css/moltran.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/contents/admin')}}/assets/css/chosen.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/contents/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
        {{-- Toster Css --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <link href="{{asset('public/public/contents/admin')}}/assets/css/sweetalert2.min.css" id="app-style" rel="stylesheet" type="text/css" />

        @yield('css')
        <script src="{{asset('public/public/contents/admin')}}/assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">

        <div id="wrapper">
        @include('admin.layouts.common.header')
        @include('admin.layouts.common.sidebar')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                Copyright © 2019 Dashboard | Development by Creative System Limited.
            </footer>
        </div>
        </div>
    	<script>
            var resizefunc = [];
        </script>
        <script src="{{asset('public/contents/admin')}}/assets/js/jquery.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/datatables.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/detect.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/fastclick.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/jquery.slimscroll.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/jquery.blockUI.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/waves.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/wow.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/jquery.nicescroll.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/jquery.scrollTo.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/moment/moment.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/counterup/jquery.counterup.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/pages/jquery.todo.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/pages/jquery.dashboard.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/jquery.app.js"></script>
        <script src="{{asset('public/contents/admin')}}/plugins/summernote/summernote-bs4.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/chosen.jquery.js"></script>
        <script src="{{asset('public/contents/admin')}}/assets/js/custom.js"></script>
         {{-- Toster alert js --}}
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
         {{-- Sweet alert Js --}}
         <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
         <script src="{{asset('publc/public/contents/admin')}}/assets/js/sweetalert2@9.js"></script>
       @stack('js')
         @yield('js')

         <script>
             @if(Session::has('messege'))
               var type="{{Session::get('alert-type','info')}}"
               switch(type){
                   case 'info':
                        toastr.info("{{ Session::get('messege') }}");
                        break;
                   case 'success':
                       toastr.success("{{ Session::get('messege') }}");
                       break;
                   case 'warning':
                      toastr.warning("{{ Session::get('messege') }}");
                       break;
                   case 'error':
                       toastr.error("{{ Session::get('messege') }}");
                       break;
               }
             @endif
          </script>
           <script>
             $(document).on("click", "#delete", function(e){
                 e.preventDefault();
                 var link = $(this).attr("href");
                    swal({
                      title: "Are you Want to delete?",
                      text: "Once Delete, This will be Permanently Delete!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                           window.location.href = link;
                      } else {
                        swal("Safe Data!");
                      }
                    });
                });
        </script>
        @yield('js')
	</body>
</html>
