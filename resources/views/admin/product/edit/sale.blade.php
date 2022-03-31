<form action="{{ route('product.sale.update') }}" method="POST">
    @csrf
    <div class="card-title">
        Product Whole Sale
    </div>
    <br><br>
    <div class="checkwholesell form-group row custom_form_group{{ $errors->has('color') ? ' has-error' : '' }}">
        {{-- <label class="col-sm-3 control-label"><span class="req_star"></span></label> --}}
        <div class="col-sm-12">
            @if (count($data->wholesales) != 0)
           @foreach ($data->wholesales as $item)
           <div id="mainwholesell">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <label for="name">Product Quantity</label>
                    <input type="hidden" name="pro_id" value="{{ $data->id }}">
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="text" name="whole_qty[]" value="{{ $item->qty }}" class="form-control" placeholder="Product Quantity">
                </div>
                <div class="col-md-4">
                    <label for="color_qty">Discount Percentage</label>
                    <input type="text" name="whole_parcent[]" value="{{ $item->discount }}" class="form-control" placeholder="Discount Parcentege">

                </div>

                <div class="col-md-2">
                    <label for="color_price"></label>
                    <button type="button" class="btn btn-danger btn-sm mt-4 removewhole">X</button>
                </div>
            </div>
        </div>
           @endforeach
            @else
            <div id="mainwholesell">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <label for="name">Product Quantity</label>
                    <input type="hidden" name="pro_id" value="{{ $data->id }}">
                        <input type="text" name="whole_qty[]" class="form-control" placeholder="Product Quantity">
                    </div>
                    <div class="col-md-4">
                        <label for="color_qty">Discount Percentage</label>
                        <input type="text" name="whole_parcent[]" class="form-control" placeholder="Discount Parcentege">

                    </div>

                    <div class="col-md-2">
                        <label for="color_price"></label>
                        <button type="button" class="btn btn-danger btn-sm mt-4 removewhole">X</button>
                    </div>
                </div>
            </div>
            @endif
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
    <div class="text-center">
        <button type="submit" class="btn btn-primary waves-effect">Update</button>
    </div>

</form>
