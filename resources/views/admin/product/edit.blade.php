@extends('admin.layouts.app')
@section('title', 'Edit Product')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="{{ asset('public/contents/admin') }}/plugins/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
<link href="{{ asset('public/contents/admin') }}/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
<link href="{{ asset('public/contents/admin') }}/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
<link href="{{ asset('public/contents/admin') }}/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

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
        <h4 class="pull-left page-title bread_title">Edit Product Product</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li><a href="{{ route('product.type') }}">Add Product</a></li>
            <li class="active">Edit Product</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="tabs-vertical-env">
            <ul class="nav nav-tabs flex-column nav tabs-vertical" role="tablist">
                <li class="nav-item"> <a class="nav-link show active" id="v-information-tab" data-toggle="tab" href="#v-information" role="tab" aria-controls="v-information" aria-selected="true">Product Information</a>
                </li>
                <li class="nav-item"> <a class="nav-link show" id="v-image-tab" data-toggle="tab" href="#v-image" role="tab" aria-controls="v-image" aria-selected="false">Product image</a>
                </li>
                @if ($data->type == 'physical')
                <li class="nav-item"> <a class="nav-link show" id="v-color-tab" data-toggle="tab" href="#v-color" role="tab" aria-controls="v-color" aria-selected="false">Product Color</a>
                </li>
                <li class="nav-item"> <a class="nav-link show" id="v-size-tab" data-toggle="tab" href="#v-size" role="tab" aria-controls="v-size" aria-selected="false">Product Size</a>
                </li>
                <li class="nav-item"> <a class="nav-link show" id="v-sale-tab" data-toggle="tab" href="#v-sale" role="tab" aria-controls="v-sale" aria-selected="false">Product Whole sale</a>
                </li>
                @elseif($data->type == 'license')
                <li class="nav-item"> <a class="nav-link show" id="v-license-tab" data-toggle="tab" href="#v-license" role="tab" aria-controls="v-license" aria-selected="false">Licenses</a>
                </li>
                @endif
                <li class="nav-item"> <a class="nav-link show" id="v-tag-tab" data-toggle="tab" href="#v-tag" role="tab" aria-controls="v-tag" aria-selected="false">Features Tags</a>
                </li>
            </ul>
            <div class="tab-content" style="width: 100%">
                <div class="tab-pane show active" id="v-information" role="tabpanel" aria-labelledby="v-information-tab">
                   @include('admin.product.edit.information')

                </div>
                <div class="tab-pane show" id="v-image" role="tabpanel" aria-labelledby="v-image-tab">
                   @include('admin.product.edit.image')
                </div>
                <div class="tab-pane show" id="v-color" role="tabpanel" aria-labelledby="v-color-tab">
                   @include('admin.product.edit.color')
                </div>
                <div class="tab-pane show" id="v-size" role="tabpanel" aria-labelledby="v-size-tab">
                   @include('admin.product.edit.size')
                </div>
                <div class="tab-pane show" id="v-license" role="tabpanel" aria-labelledby="v-license-tab">
                   @include('admin.product.edit.license')
                </div>
                <div class="tab-pane show" id="v-tag" role="tabpanel" aria-labelledby="v-tag-tab">
                   @include('admin.product.edit.tag')
                </div>
                <div class="tab-pane show" id="v-sale" role="tabpanel" aria-labelledby="v-sale-tab">
                   @include('admin.product.edit.sale')
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
{{-- <script>
    $(document).ready(function(){
  alert($('#input').tagsinput('items'));
});
</script> --}}
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

$('select[name="file_type"]').on('change', function(){
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

$('input[name="checkcondition"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.condtition').removeClass('d-none');
    }else{
        $('.condtition').addClass('d-none');
    }
})
$('input[name="checkmeasure"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.measure').removeClass('d-none');
    }else{
        $('.measure').addClass('d-none');
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
$('input[name="checkshiptime"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.checkshiptime').removeClass('d-none');
    }else{
        $('.checkshiptime').addClass('d-none');
    }
})
$('input[name="checksize"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.checksize').removeClass('d-none');
    }else{
        $('.checksize').addClass('d-none');
    }
})
$('input[name="checkcolor"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.checkcolor').removeClass('d-none');
    }else{
        $('.checkcolor').addClass('d-none');
    }
})
$('input[name="checkwholesell"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.checkwholesell').removeClass('d-none');
    }else{
        $('.checkwholesell').addClass('d-none');
    }
})

function Addsize(){

    var last = i++;
        var html ='<div id="mainsize'+last +'">'+
                        '<div class="row">'+
                           ' <div class="col-md-1"></div>'+
                           ' <div class="col-md-3">'+
                               ' <label for="name">Name</label>'+
                               ' <input type="text" name="size_name[]" class="form-control">'+
                            '</div>'+
                           ' <div class="col-md-3">'+
                               ' <label for="size_qty"> Quantity</label>'+
                               ' <input type="text" name="size_qty[]" class="form-control">'+

                           ' </div>'+
                            '<div class="col-md-3">'+
                               ' <label for="size_price">Price</label>'+
                                '<input type="text" name="size_price[]" class="form-control">'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<label for="size_price"></label>'+
                                '<button type="button"  class="btn btn-danger btn-sm mt-4 removesize" data-id="'+last+'">X</button>'+
                            '</div>'+
                       ' </div>'+
                    '</div>';
        $('#copysize').append(html);
        $(document).on('click','.removesize',function(){
            var id = $(this).data('id');
            $('#mainsize'+id+'').remove();
        })
}
function Addcolor(){

        var last = i++;
        var html ='<div id="maincolor'+last +'">'+
                        '<div class="row">'+
                           ' <div class="col-md-1"></div>'+
                           ' <div class="col-md-3">'+
                               ' <label for="name">Color Name</label>'+
                               ' <input type="text" name="color_name[]" class="form-control">'+
                            '</div>'+
                           ' <div class="col-md-3">'+
                               ' <label for="color_qty"> Quantity</label>'+
                               ' <input type="text" name="color_qty[]" class="form-control">'+

                           ' </div>'+
                            '<div class="col-md-3">'+
                               ' <label for="color_price">Price</label>'+
                                '<input type="text" name="color_price[]" class="form-control">'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<label for="color_price"></label>'+
                                '<button type="button"  class="btn btn-danger btn-sm mt-4 removecolor" data-id="'+last+'">X</button>'+
                            '</div>'+
                       ' </div>'+
                    '</div>';
        $('#copycolor').append(html);
        $(document).on('click','.removecolor',function(){
            var id = $(this).data('id');
            $('#maincolor'+id+'').remove();
        })
}
function Addwholesell(){

        var last = i++;
        var html ='<div id="mainwholesell'+last +'">'+
                        '<div class="row">'+
                           ' <div class="col-md-1"></div>'+
                           ' <div class="col-md-4">'+
                               ' <label for="name">Product Quantity</label>'+
                               ' <input type="text" name="whole_qty[]" class="form-control" placeholder="Product Quantity">'+
                            '</div>'+
                           ' <div class="col-md-4">'+
                               ' <label >Discount Parcent</label>'+
                               ' <input type="text" name="whole_parcent[]" class="form-control" placeholder="Discount Parcent">'+

                           ' </div>'+
                            '<div class="col-md-2">'+
                                '<label for="color_price"></label>'+
                                '<button type="button"  class="btn btn-danger btn-sm mt-4 removewhole" data-id="'+last+'">X</button>'+
                            '</div>'+
                       ' </div>'+
                    '</div>';
        $('#copywholesell').append(html);
        $(document).on('click','.removewhole',function(){
            var id = $(this).data('id');
            $('#mainwholesell'+id+'').remove();
        })
}

function Addfeature(){

var last = i++;
var html ='<div id="mainfeature'+last +'">'+
                '<div class="row">'+
                   ' <div class="col-md-1"></div>'+
                   '<div class="col-md-4">'+
                                '<label for="name">Feature Tag</label>'+
                                '<input type="text" name="feature_tag[]" class="form-control" placeholder="Feature Tag">'+
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
                                '<label for="name">License Key</label>'+
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
