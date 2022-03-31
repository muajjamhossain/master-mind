@extends('admin.layouts.app')
@section('title', 'Role Permission')
@section('css')
<style>
   .nav-item .active{

        border-left: 2px solid rgb(32, 32, 226);
    }
</style>
<link rel="stylesheet" href="{{ asset('public/contents/admin/plugins/switchery/switchery.min.css') }}">
<script src="{{ asset('public/contents/admin/plugins/switchery/switchery.min.js') }}"></script>

@endsection
@section('content')

<div class="row mt-2">
	<div class="col-xl-12">
		<div class="tabs-vertical-env">
			<ul class="nav nav-tabs flex-column nav tabs-vertical" role="tablist">
				<li class=""> <a class="nav-link disabled " aria-disabled="true" style="border:1px solid rgb(190, 187, 187)" >Role Information</a>
				</li>
				<li class="nav-item"> <a class="nav-link show active" id="v-social-tab" data-toggle="tab" href="#v-social" role="tab" aria-controls="v-social" aria-selected="false">Genarel</a>
				</li>
				<li class="nav-item"> <a class="nav-link show " id="v-contact-tab" data-toggle="tab" href="#v-contact" role="tab" aria-controls="v-contact" aria-selected="true">Permission</a>
				</li>

            </ul>

			<div class="tab-content col-xl-12">

				<div class="tab-pane show active" id="v-social" role="tabpanel" aria-labelledby="v-social-tab">
                    <form action="{{ route('role.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group row">
                        <label for="my-input" class="col-md-3"></label>
                        <label for="my-input" class="col-md-2">Name</label>
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <input id="my-input" class="form-control col-md-4" type="text" name="name" value="{{ $role->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary"  style="margin-left: 450px">Update</button>
                    </form>
				</div>
				<div class="tab-pane show " id="v-contact" role="tabpanel" aria-labelledby="v-contact-tab">
                    <form class="form-horizontal" method="post" action="{{route('setting.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Permission</h3>
                                    </div>
                                    <div class="col-md-4 text-right">
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
                              <div class="row">
                                  <div class="col-md-7"></div>
                                  <div class="col-md-1" style="padding: 0px 5px">Index</div>
                                  <div class="col-md-1" style="padding: 0px 5px">Create</div>
                                  <div class="col-md-1" style="padding: 0px 5px">Edit</div>
                                  <div class="col-md-1"  style="padding: 0px 5px">Update</div>
                                  <div class="col-md-1"  style="padding: 0px 5px">Delete</div>
                              </div>
                              <br>
                              <hr>

                              <div class="form-group row">
                                <div class="col-md-4">User</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index user') === true) checked  @endif data-permission="index user" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                    </div>
                                  </div>

                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create user') === true) checked  @endif data-permission="create user" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit user') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit user" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update user') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update user" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete user') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete user" data-color="#039cfd" />
                                    </div>
                                  </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <div class="col-md-4">Admin</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index admin') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="index admin" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create admin') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="create admin" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit admin') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit admin" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update admin') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update admin" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete admin') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete admin" data-color="#039cfd" />

                                    </div>
                                  </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <div class="col-md-4">Testimonials</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index testimonial') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="index testimonial" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create testimonial') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="create testimonial" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit testimonial') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit testimonial" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update testimonial') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update testimonial" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete testimonial') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete testimonial" data-color="#039cfd" />
                                    </div>
                                  </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <div class="col-md-4">Brands</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index brand') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="index brand" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create brand') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="create brand" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit brand') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit brand" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update brand') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update brand" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete brand') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete brand" data-color="#039cfd" />
                                    </div>
                                  </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <div class="col-md-4">Product Category</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index product category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="index product category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create product category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="create product category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit product category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit product category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update product category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update product category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete product category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete product category" data-color="#039cfd" />
                                    </div>
                                  </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <div class="col-md-4">Product</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index product') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="index product" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create product') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="create product" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit product') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit product" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update product') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update product" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete product') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete product" data-color="#039cfd" />
                                    </div>
                                  </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <div class="col-md-4">Posts</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index post') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="index post" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create post') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="create post" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit post') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit post" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update post') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update post" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete post') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete post" data-color="#039cfd" />
                                    </div>
                                  </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <div class="col-md-4">Post Category</div>
                                <div class="col-md-3"></div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('index post category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="index post category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('create post category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="create post category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit post category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit post category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('update post category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="update post category" data-color="#039cfd" />
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="switchery-demo">
                                        <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete post category') == true) checked  @endif  data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete post category" data-color="#039cfd" />
                                    </div>
                                  </div>
                              </div>
                              <hr>
                            </div>
                            <div class="card-footer card_footer_button text-center">
                                <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                            </div>
                        </div>
                      </form>

				</div>


	        </div>

</div>


@endsection
@section('js')

<script>
    $(document).ready(function(){

        $('input[name="permission"]').on('change',function(){

            var check = $(this).prop('checked');
                var id = $(this).data('id');
                var permission = $(this).data('permission');
                    $.ajaxSetup({
                    headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    url: '{{ route('permission.update') }}',
                    method: "POST",
                    data:{id:id, permission:permission, check:check},
                    success: function(data){

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                            getValues()
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }
                        }
                })


        })
    })
</script>

@endsection




