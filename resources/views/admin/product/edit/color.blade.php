<form action="{{ route('product.color.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-title">
        Product Color
    </div>
    <br><br>
    <div class="checkcolor form-group row custom_form_group{{ $errors->has('color') ? ' has-error' : '' }}">
        {{-- <label class="col-sm-3 control-label"><span class="req_star"></span></label> --}}
        <div class="col-sm-10">
            @if (count($data->colors) != 0)
            @foreach ($data->colors as $item)
            <div id="maincolor">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <input type="hidden" name="pro_id" value="{{ $data->id }}">
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <input type="text" name="color_name[]" value="{{ $item->name }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="color_qty"> Quantity</label>
                        <input type="text" name="color_qty[]" value="{{ $item->qty }}" class="form-control">

                    </div>
                    <div class="col-md-3">
                        <label for="color_price">Price</label>
                        <input type="text" name="color_price[]" value="{{ $item->price }}" class="form-control">

                    </div>
                    <div class="col-md-2">
                        <label for="color_price"></label>
                        <button type="button" class="btn btn-danger btn-sm mt-4 removecolor">X</button>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div id="maincolor">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <input type="hidden" name="pro_id" value="{{ $data->id }}">
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
            @endif
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

    <div class="text-center">
        <button type="submit" class="btn btn-primary waves-effect">Update</button>
    </div>


</form>
