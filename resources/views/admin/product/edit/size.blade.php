<form action="{{ route('product.size.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-title">
        Product Size
    </div>
    <br><br>
    <div class="checksize form-group row custom_form_group{{ $errors->has('size') ? ' has-error' : '' }}">
        {{-- <label class="col-sm-3 control-label"><span class="req_star"></span></label> --}}
        <div class="col-sm-10">
            @if (count($data->sizes) != 0)
            @foreach ($data->sizes as$item)
                <div id="mainsize">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label for="name">Size</label>
                            <input type="hidden" name="pro_id" value="{{ $data->id }}">
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
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
            @else
            <div id="mainsize">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <label for="name"> Name</label>
                        <input type="hidden" name="pro_id" value="{{ $data->id }}">
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
            </div>
            @endif
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
    <div class="text-center">
        <button type="submit" class="btn btn-primary waves-effect">Update</button>
    </div>
</form>
