<form action="{{ route('product.image.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="card-title">
    Product Image Gallery
</div>
<br><br>
    <div class="form-group row custom_form_group{{ $errors->has('gallery') ? ' has-error' : '' }}">
        {{-- <label class="col-sm-3 control-label"><span class="req_star"></span></label> --}}
        <div class="col-sm-10">
                  <label for="upload_imgs" class="button hollow">Select Gallery Images +</label>
                  <input type="hidden" name="pro_id" value="{{ $data->id }}">
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
        {{-- <div class="col-sm-5"></div> --}}
        <div class="col-sm-10">
            <div class="row">
                @foreach ($data->images as $item)
                    <div class="col-md-3">
                    <img src="{{ URL::to($item->gallery) }}" width="150" height="150" alt="">

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary waves-effect">Update</button>
    </div>
</form>
