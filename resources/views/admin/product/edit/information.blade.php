<form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="form-group row custom_form_group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Product Name: <span class="req_star">*</span></label>
        <div class="col-sm-7">
            <input type="hidden" name="type" value="physical">
          <input type="text" class="form-control" name="name" value="{{$data->name}}">
          <input type="hidden" name="id" value="{{ $data->id }}">
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

    @if ($data->type == 'license' OR $data->type == 'digital')
    <div class="form-group row custom_form_group">
        <label class="col-sm-3 control-label">Select Uploaded Type<span class="req_star"></span></label>
        <div class="col-sm-7">
           <select name="file_type" id="" class="form-control" >
               <option value="File" @if ($data->file_type == 'File') selected @endif>Upload By File</option>
               <option value="Link" @if ($data->file_type == 'Link') selected @endif>Upload By Link</option>
           </select>
        </div>
    </div>
    <div class="UploadFile form-group @if ($data->file_type != 'File') d-none @endif row custom_form_group{{ $errors->has('upload_file') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Select File:<span class="req_star">*</span></label>
        <div class="col-sm-7">
          <input type="file" name="upload_file" class="form-control" value="{{old('upload_file')}}">
          @if ($data->file != '')
          <input type="hidden" name="old_file" class="form-control" value="{{$data->file}}">

          @endif
          @if ($errors->has('upload_file'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('upload_file') }}</strong>
              </span>
          @endif
        </div>
    </div>

    <div class="uploadLink form-group @if ($data->file_type != 'Link') d-none @endif row custom_form_group{{ $errors->has('upload_link') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Upload Link:<span class="req_star"></span></label>
        <div class="col-sm-7">
          <input type="text" type="file" name="upload_link" class="form-control" value="{{$data->link ? : ''}}">
          @if ($errors->has('upload_link'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('upload_link') }}</strong>
              </span>
          @endif
        </div>
    </div>
    @endif

    <div class="form-group row custom_form_group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Feature Image:<span class="req_star"></span></label>
        <div class="col-sm-4">
          <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file btnu_browse">
                      Browse… <input type="file" name="image" id="imgInp">
                      <input type="hidden" name="old_image" value="{{ $data->image }}">
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



    <div class="form-group row custom_form_group{{ $errors->has('discount_price') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Product Discount Price:<span class="req_star"></span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="discount_price" value="{{$data->discount_price}}">
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
          <input type="text" class="form-control" name="selling_price" value="{{$data->selling_price}}">
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
          <input type="text" class="form-control" name="stock" value="{{$data->stock}}">
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
            <input type="checkbox" @if ($data->measure != '') checked @endif name="checkmeasure" id="measure" ><label for="measure" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product measurement</label>
        </div>
    </div>
    <div class="measure form-group @if ($data->measure == '') d-none @endif row custom_form_group{{ $errors->has('measure') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Product measurement:<span class="req_star">*</span></label>
        <div class="col-sm-7">
          <select name="measurement" class="form-control" id="">
              <option value="Gram" @if ($data->measure == 'Gram') selected @endif>Gram</option>
              <option value="Kilugram" @if ($data->measure == 'Kilugram') selected @endif>Kilugram</option>
              <option value="Liter" @if ($data->measure == 'Liter') selected @endif>Liter</option>
              <option value="Pound" @if ($data->measure == 'Pound') selected @endif>Pound</option>
              <option value="Custom" @if ($data->measure == 'Custom') selected @endif>Custom</option>
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
            <textarea cols="68" rows="4" name="description">{{ $data->description ? : '' }}</textarea>
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
            <textarea cols="68" rows="4" name="policy">{{ $data->policy ? : '' }}</textarea>
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
          <input type="text" class="form-control" name="video_url" value="{{$data->youtube ? : ''}}" placeholder="Enter Product Video Url">
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
            <input type="checkbox" name="checkseo" @if ($data->meta_tag != '' OR $data->meta_description != '') checked @endif id="seo" ><label for="seo" style="font-weight: 16px; margin-left:7px;cursor: pointer;">Allow Product SEO</label>
        </div>
    </div>
    <div class="productSeo @if ($data->meta_tag == '' AND $data->meta_description == '') d-none @endif">
        <div class="form-group row custom_form_group{{ $errors->has('meta_tag') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Product Meta Tag:<span class="req_star">*</span></label>
            <div class="col-sm-7">
              <input type="text" name="meta_tag" placeholder="Enter Meta Tag" value="{{ $data->meta_tag ? : '' }}" class="form-control">
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
              <input type="text" name="meta_description" placeholder="Enter Meta Description" value="{{ $data->meta_description ? : '' }}" class="form-control">
              @if ($errors->has('meta_description'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('meta_description') }}</strong>
                  </span>
              @endif
            </div>
        </div>
    </div>

    <style>
        .bootstrap-tagsinput{
            width: 100% !important;
        }
    </style>
    <div class="form-group row custom_form_group{{ $errors->has('tags') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Product Tag:<span class="req_star">*</span></label>
        <div class="col-sm-7">

                <input id="input" style="width: 100% !important;" value="{{ $data->tags }}" name="tags" class="form-control" placeholder="Enter Product Tags" data-role="tagsinput">

          @if ($errors->has('tags'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tags') }}</strong>
              </span>
          @endif
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary waves-effect">Update</button>
</div>
</form>
