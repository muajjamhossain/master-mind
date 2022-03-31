@extends('admin.layouts.app')
@section('title', 'Add Product')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="{{ asset('public/contents/admin') }}/plugins/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
<link href="{{ asset('public/contents/admin') }}/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
<link href="{{ asset('public/contents/admin') }}/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
<link href="{{ asset('public/contents/admin') }}/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>>
<style>
    .quote-imgs-thumbs {
  background: #eee;
  border: 1px solid #ccc;
  border-radius: 0.25rem;
  margin: 1.5rem 0;
  padding: 0.75rem;
}
.quote-imgs-thumbs--hidden {
  display: none;
}
.img-preview-thumb {
  background: #fff;
  border: 1px solid #777;
  border-radius: 0.25rem;
  box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
  margin-right: 1rem;
  max-width: 140px;
  padding: 0.25rem;
}
</style>
@endsection
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Physical Product</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li><a href="{{ route('product.type') }}">Add Product</a></li>
            <li class="active">License Product</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="POST" action="{{route('product.insert')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Add License Product</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{route('products')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Product</a>
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
                             <strong>Successfully!</strong> Upload Digital Product.
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
                <div class="form-group row custom_form_group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="name" value="{{old('name')}}">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('sku') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product SKU:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="hidden" name="type" value="license">
                      <input type="text" class="form-control" name="sku" value="{{ \Str::random(12)}}">
                      @if ($errors->has('sku'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('sku') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Category:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <div id="cateOutput"></div>
                        <select multiple data-placeholder="Choose Post Category ..." name="category_id[]" class="chosen-select form-control">
                          <option value="">Please Select Category</option>
                          @foreach ($categories as $key => $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('category_id'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('category_id') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Select Uploaded Type<span class="req_star"></span></label>
                    <div class="col-sm-7">
                       <select name="checkfiletype" id="" class="form-control">
                           <option value="File">Upload By File</option>
                           <option value="Link">Upload By Link</option>
                       </select>
                    </div>
                </div>
                <div class="UploadFile form-group row custom_form_group{{ $errors->has('upload_file') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Select File:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="file" name="upload_file" class="form-control">
                      @if ($errors->has('upload_file'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('upload_file') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="uploadLink form-group d-none row custom_form_group{{ $errors->has('upload_link') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Upload Link:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" type="file" name="upload_link" class="form-control">
                      @if ($errors->has('upload_link'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('upload_link') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>


                <div class="form-group row custom_form_group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Feature Image:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      @if ($errors->has('image'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('image') }}</strong>
                          </span>
                      @endif
                      <img id='img-upload'/>
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('gallery') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Gallery Image:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <label for="upload_imgs" class="button hollow">Select Your Images +</label>
                        <input class="show-for-sr d-none" type="file" id="upload_imgs" name="gallery[]" multiple/>
                      </p>
                      <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
                      @if ($errors->has('gallery'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('gallery') }}</strong>
                          </span>
                      @endif
                      <img id='img-upload'/>
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('discount_price') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Discount Price:<span class="req_star"></span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="discount_price" value="{{old('discount_price')}}">
                      @if ($errors->has('discount_price'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('discount_price') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Selling Price(In {{ config('settings.currency_symbol') }}):<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="selling_price" value="{{old('selling_price')}}">
                      @if ($errors->has('selling_price'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('selling_price') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="checkcolor form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Product License<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <div id="mainlicense">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name">Product License</label>
                                <input type="text" name="license_key[]" class="form-control" placeholder="License Key">
                            </div>
                            <div class="col-md-4">
                                <label for="color_qty"> Quantity</label>
                                <input type="text" name="licens_qty[]" class="form-control" placeholder="Licnese Quantity">
                            </div>
                            <div class="col-md-2">
                                <label for="color_price"></label>
                                <button type="button" class="btn btn-danger btn-sm mt-4 removecolor">X</button>
                            </div>
                        </div>
                    </div>
                     <div id="copylicense">
                     </div>
                     <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                        <div class="col-sm-7">
                        <button type="button" class="btn btn-dark btn-sm" onclick="Addlicense()" style="margin-top: 20px">Add More Field</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Description:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <textarea cols="68" rows="4" name="description"></textarea>
                      @if ($errors->has('description'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('policy') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Buy/Retrun Policy:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <textarea cols="68" rows="4" name="policy"></textarea>
                      @if ($errors->has('policy'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('policy') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('video_url') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">YouTube Vide Url:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="video_url" value="{{old('video_url')}}" placeholder="Enter Product Video Url">
                      @if ($errors->has('video_url'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('video_url') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('seo') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        <input type="checkbox" name="checkseo" id="seo" ><label for="seo" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product SEO</label>
                    </div>
                </div>
                <div class="productSeo d-none">
                    <div class="form-group row custom_form_group{{ $errors->has('meta_tag') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Product Meta Tag:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" name="meta_tag" placeholder="Enter Meta Tag" class="form-control">
                          @if ($errors->has('meta_tag'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('meta_tag') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Product Meta Description:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" name="meta_description" placeholder="Enter Meta Description" class="form-control">
                          @if ($errors->has('meta_description'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('meta_description') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                </div>

                <div class=" form-group row custom_form_group">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        <h5>Product Features Tags</h5>
                    <div id="mainfeature">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name"></label>
                                <input type="text" name="feature_tag[]" class="form-control" placeholder="Feature Tag">
                            </div>
                            <div class="col-md-4">
                                <label for="color_qty"> </label>
                                <input type="text" name="feature_value[]" class="form-control" placeholder="Feature Value">
                            </div>
                            <div class="col-md-2">
                                <label for="color_price"></label>
                                <button type="button" class="btn btn-danger btn-sm mt-4 removefeature">X</button>
                            </div>
                        </div>
                    </div>
                     <div id="copyfeature">
                     </div>
                     <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                        <div class="col-sm-7">
                        <button type="button" class="btn btn-dark btn-sm" onclick="Addfeature()" style="margin-top: 20px">Add More Field</button>
                        </div>
                    </div>
                    </div>
                </div>

                <style>
                    .bootstrap-tagsinput{
                        width: 100% !important;
                    }
                </style>
                <div class="form-group row custom_form_group{{ $errors->has('tag') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Tag:<span class="req_star">*</span></label>
                    <div class="col-sm-7">

                        <input id="input" style="width: 100% !important;" name="tags" class="form-control" placeholder="Enter Product Tags" data-role="tagsinput">


                      @if ($errors->has('tag'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tag') }}</strong>
                          </span>
                      @endif
                </div>
              </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
              </div>
          </div>
        </form>
    </div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="{{ asset('public/contents/admin') }}/plugins/colorpicker/bootstrap-colorpicker.js"></script>
<script src="{{ asset('public/contents/admin') }}/plugins/jquery-multi-select/jquery.multi-select.js"></script>
<script src="{{ asset('public/contents/admin') }}/plugins/jquery-multi-select/jquery.quicksearch.js"></script>
<script>
    var imgUpload = document.getElementById('upload_imgs')
  , imgPreview = document.getElementById('img_preview')
  , imgUploadForm = document.getElementById('img-upload-form')
  , totalFiles
  , previewTitle
  , previewTitleText
  , img;

imgUpload.addEventListener('change', previewImgs, false);
imgUploadForm.addEventListener('submit', function (e) {
  e.preventDefault();
  alert('Images Uploaded! (not really, but it would if this was on your website)');
}, false);

function previewImgs(event) {
  totalFiles = imgUpload.files.length;

  if(!!totalFiles) {
    imgPreview.classList.remove('quote-imgs-thumbs--hidden');
    previewTitle = document.createElement('p');
    previewTitle.style.fontWeight = 'bold';
    previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
    previewTitle.appendChild(previewTitleText);
    imgPreview.appendChild(previewTitle);
  }

  for(var i = 0; i < totalFiles; i++) {
    img = document.createElement('img');
    img.src = URL.createObjectURL(event.target.files[i]);
    img.classList.add('img-preview-thumb');
    imgPreview.appendChild(img);
  }
}
</script>
@endpush
@section('js')
<script>
//     $(document).ready(function() {
//     $('#summernote').summernote();
//   });

$('select[name="checkfiletype"]').on('change', function(){
var id = $(this).val();
if(id == 'File'){
    $('.UploadFile').removeClass('d-none');
    $('.uploadLink').addClass('d-none');
}
else{
$('.UploadFile').addClass('d-none');
$('.uploadLink').removeClass('d-none');
}
})

$('input[name="checkseo"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.productSeo').removeClass('d-none');
    }else{
        $('.productSeo').addClass('d-none');
    }
})

function Addfeature(){

var last = i++;
var html ='<div id="mainfeature'+last +'">'+
                '<div class="row">'+
                   ' <div class="col-md-1"></div>'+
                   '<div class="col-md-4">'+
                                '<label for="name">Feature Tag</label>'+
                                '<input type="text" name="feature_tag[]" class="form-control" placeholder="License Key">'+
                            '</div>'+
                            '<div class="col-md-4">'+
                                '<label for="color_qty">Feature Value </label>'+
                                '<input type="text" name="feature_value[]" class="form-control" placeholder="Feature Value">'+
                            '</div>'+
                    '<div class="col-md-2">'+
                        '<label for="color_price"></label>'+
                        '<button type="button"  class="btn btn-danger btn-sm mt-4 removefeature" data-id="'+last+'">X</button>'+
                    '</div>'+
               ' </div>'+
            '</div>';
$('#copyfeature').append(html);
$(document).on('click','.removefeature',function(){
    var id = $(this).data('id');
    $('#mainfeature'+id+'').remove();
})
}
function Addlicense(){

var last = i++;
var html ='<div id="mainlicense'+last +'">'+
                '<div class="row">'+
                   ' <div class="col-md-1"></div>'+
                   '<div class="col-md-4">'+
                                '<label for="name">Product License</label>'+
                                '<input type="text" name="license_key[]" class="form-control" placeholder="License Key">'+
                            '</div>'+
                            '<div class="col-md-4">'+
                                '<label for="color_qty"> Quantity</label>'+
                                '<input type="text" name="license_qty[]" class="form-control" placeholder="Licnese Quantity">'+
                            '</div>'+
                    '<div class="col-md-2">'+
                        '<label for="color_price"></label>'+
                        '<button type="button"  class="btn btn-danger btn-sm mt-4 removelicense" data-id="'+last+'">X</button>'+
                    '</div>'+
               ' </div>'+
            '</div>';
$('#copylicense').append(html);
$(document).on('click','.removelicense',function(){
    var id = $(this).data('id');
    $('#mainlicense'+id+'').remove();
})
}



</script>
@endsection
@endsection
