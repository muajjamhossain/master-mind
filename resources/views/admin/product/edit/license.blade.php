<form action="">
    <div class="card-title">
        Product License Key
    </div>
    <br><br>
    <div class="checkcolor form-group row custom_form_group">
        {{-- <label class="col-sm-3 control-label">Product License<span class="req_star">*</span></label> --}}
        <div class="col-sm-10">
            @if (count($data->licenses) != 0)
            @foreach ($data->licenses as $item)
            <div id="mainlicense">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <label for="name">Product License</label>
                        <input type="hidden" name="pro_id" value="{{ $data->id }}">
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <input type="text" name="license_key[]" value="{{ $item->key }}" class="form-control" placeholder="License Key">
                    </div>
                    <div class="col-md-4">
                        <label for="color_qty"> Quantity</label>
                        <input type="text" name="licens_qty[]" value="{{ $item->qty }}" class="form-control" placeholder="Licnese Quantity">
                    </div>
                    <div class="col-md-2">
                        <label for="color_price"></label>
                        <button type="button" class="btn btn-danger btn-sm mt-4 removecolor">X</button>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div id="mainlicense">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <label for="name">Product License</label>
                        <input type="hidden" name="pro_id" value="{{ $data->id }}">
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
            @endif
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

</form>
