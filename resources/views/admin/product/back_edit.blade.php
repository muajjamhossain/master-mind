@extends('admin.layouts.app')
@section('title', 'Add Product')
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
    <div class="col-lg-12">
        <form class="form-horizontal" method="POST" action="{{route('product.insert')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Edit Product</h3>
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
                             <strong>Successfully!</strong> Update Product.
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
                    <label class="col-sm-3 control-label">Product Name: <span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="hidden" name="type" value="physical">
                      <input type="text" class="form-control" name="name" value="{{$data->name}}">
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
                      <input type="text" class="form-control" name="sku" value="{{$data->sku}}">
                      @if ($errors->has('sku'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('sku') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('conditions') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        @if ($data->product_condition != '')
                        <input type="checkbox" name="checkcondition" id="condtition" checked><label for="condtition" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product Condition</label>
                        @else
                        <input type="checkbox" name="checkcondition" id="condtition" ><label for="condtition" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product Condition</label>
                        @endif
                    </div>
                </div>


               <div class="condtition form-group @if ($data->product_condition == '') d-none @endif row custom_form_group{{ $errors->has('conditions') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Conditions: <span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <select name="condition" class="form-control" id="">
                        <option value="New" @if ($data->product_condition == 'New') selected @endif>New</option>
                        <option value="Used" @if ($data->product_condition == 'Used') selected @endif>Used</option>
                    </select>
                    @if ($errors->has('conditions'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('conditions') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Category:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <div id="cateOutput"></div>
                      <select multiple="multiple" data-placeholder="Choose Post Category ..." name="category_id[]" class="chosen-select form-control">

                          @foreach ($categories as $category)
                          @php
                          $check = in_array($category->id, $data->categories->pluck('id')->toArray()) ? 'selected' : '';

                          @endphp
                          <option value="{{ $category->id }}" {{ $check }} >{{ $category->name }}</option>
                         @endforeach
                      </select>

                      @if ($errors->has('category_id'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('category_id') }}</strong>
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
                    <div class="col-sm-4">
                        <img src="{{ URL::to($data->image) }}" width="150" height="150" alt="">
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
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-7">
                        <div class="row">
                            @foreach ($data->images as $item)
                                <div class="col-md-4">
                                <img src="{{ URL::to($item->gallery) }}" width="150" height="150" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>


                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        <input type="checkbox" @if ($data->ship_time != '') checked @endif name="checkshiptime" id="shiptime" ><label for="shiptime" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Eshitimeted Shipping Time</label>
                    </div>
                </div>

                <div class="checkshiptime form-group @if ($data->ship_time == '') d-none @endif row custom_form_group{{ $errors->has('ship_time') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Delevery Time:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                     <input type="text" name="ship_time" class="form-control" value="{{ $data->ship_time }}">
                      @if ($errors->has('ship_time'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('ship_time') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        <input type="checkbox" name="checksize" @if (count($data->sizes) != 0) checked @endif id="size" ><label for="size" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product Size</label>
                    </div>
                </div>

                <div class="checksize form-group @if (count($data->sizes) == 0) d-none @endif row custom_form_group{{ $errors->has('size') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        @foreach ($data->sizes as $key => $item)
                        <div id="mainsize{{ $key.$item->id }}">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <label for="name">Size</label>
                                    <input type="text" name="size_name[]" value="{{ $item->name }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="size_qty"> Quantity</label>
                                    <input type="text" name="size_qty[]" value="{{ $item->qty }}" class="form-control">

                                </div>
                                <div class="col-md-3">
                                    <label for="size_price">Price</label>
                                    <input type="text" name="size_price[]" value="{{ $item->price }}" class="form-control">

                                </div>
                                <div class="col-md-2">
                                    <label for="size_price"></label>
                                    <button type="button"  class="btn btn-danger btn-sm mt-4 removesize">X</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    {{-- <div id="mainsize">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <label for="name">Size Name</label>
                                <input type="text" name="size_name[]" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="size_qty"> Quantity</label>
                                <input type="text" name="size_qty[]" class="form-control">

                            </div>
                            <div class="col-md-3">
                                <label for="size_price">Price</label>
                                <input type="text" name="size_price[]" class="form-control">

                            </div>
                            <div class="col-md-2">
                                <label for="size_price"></label>
                                <button type="button"  class="btn btn-danger btn-sm mt-4 removesize">X</button>
                            </div>
                        </div>
                    </div> --}}
                     <div id="copysize">

                     </div>
                     <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                        <div class="col-sm-7">
                        <button type="button" class="btn btn-dark btn-sm" onclick="Addsize()" class="addmoresize" style="margin-top: 20px">Add More Field</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        <input type="checkbox" name="checkcolor" id="color" ><label for="color" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product Color</label>
                    </div>
                </div>

                <div class="checkcolor form-group d-none row custom_form_group{{ $errors->has('color') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                    <div id="maincolor">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <label for="name">Color Name</label>
                                <input type="text" name="color_name[]" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="color_qty"> Quantity</label>
                                <input type="text" name="color_qty[]" class="form-control">

                            </div>
                            <div class="col-md-3">
                                <label for="color_price">Price</label>
                                <input type="text" name="color_price[]" class="form-control">

                            </div>
                            <div class="col-md-2">
                                <label for="color_price"></label>
                                <button type="button" class="btn btn-danger btn-sm mt-4 removecolor">X</button>
                            </div>
                        </div>
                    </div>
                     <div id="copycolor">
                     </div>
                     <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                        <div class="col-sm-7">
                        <button type="button" class="btn btn-dark btn-sm" onclick="Addcolor()" style="margin-top: 20px">Add More Field</button>
                        </div>
                    </div>
                    </div>
                </div>


                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        <input type="checkbox" name="checkwholesell" id="wholesell" ><label for="wholesell" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product Whole sell</label>
                    </div>
                </div>

                <div class="checkwholesell d-none form-group d-none row custom_form_group{{ $errors->has('color') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                    <div id="mainwholesell">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name">Product Quantity</label>
                                <input type="text" name="whole_qty[]" class="form-control" placeholder="Product Quantity">
                            </div>
                            <div class="col-md-4">
                                <label for="color_qty"> Discount Percentage</label>
                                <input type="text" name="whole_parcent[]" class="form-control" placeholder="Discount Parcentege">

                            </div>

                            <div class="col-md-2">
                                <label for="color_price"></label>
                                <button type="button" class="btn btn-danger btn-sm mt-4 removewhole">X</button>
                            </div>
                        </div>
                    </div>
                     <div id="copywholesell">
                     </div>
                     <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                        <div class="col-sm-7">
                        <button type="button" class="btn btn-dark btn-sm" onclick="Addwholesell()" style="margin-top: 20px">Add More Field</button>
                        </div>
                    </div>
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
                <div class="form-group row custom_form_group{{ $errors->has('stock') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Stock:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="stock" value="{{old('stock')}}">
                      @if ($errors->has('stock'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('stock') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('measure') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label"><span class="req_star"></span></label>
                    <div class="col-sm-7">
                        <input type="checkbox" name="checkmeasure" id="measure" ><label for="measure" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product measurement</label>
                    </div>
                </div>
                <div class="measure d-none form-group d-none row custom_form_group{{ $errors->has('measure') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product measurement:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select name="measurement" class="form-control" id="">
                          <option value="Gram">Gram</option>
                          <option value="Kilugram">Kilugram</option>
                          <option value="Liter">Liter</option>
                          <option value="Pound">Pound</option>
                          <option value="Custom">Custom</option>
                      </select>
                      @if ($errors->has('measurement'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('measurement') }}</strong>
                          </span>
                      @endif
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
                    <label class="col-sm-3 control-label">Product Buy/Retrun Policy:<span class="req_star"></span></label>
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
                    <label class="col-sm-3 control-label">YouTube Vide URL:<span class="req_star"></span></label>
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
                                <input type="text" name="feature_tag" class="form-control" placeholder="Feature Tag">
                            </div>
                            <div class="col-md-4">
                                <label for="color_qty"> </label>
                                <input type="text" name="feature_value" class="form-control" placeholder="Feature Value">
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

              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
              </div>
          </div>
        </form>
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


$('input[name="checkcondition"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.condtition').removeClass('d-none');
    }else{
        $('.condtition').addClass('d-none');
    }
})
$('input[name="checkmeasurement"]').on('change',function(){
    var id = $(this).prop('checked');

    if(id == true){
    $('.measurement').removeClass('d-none');
    }else{
        $('.measurement').addClass('d-none');
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
                               ' <label for="name">Size Name</label>'+
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


</script>
@endsection
@endsection
