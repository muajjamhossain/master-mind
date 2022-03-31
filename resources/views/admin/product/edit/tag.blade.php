<form action="{{ route('product.feature.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-title">
        Product Features Tags
    </div>
    <br><br>
    <div class=" form-group row custom_form_group">
        {{-- <label class="col-sm-3 control-label"><span class="req_star"></span></label> --}}
        <div class="col-sm-10">
            @if (count($data->featuretags) != 0)
            @foreach ($data->featuretags as $item)
            <div id="mainfeature">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <label for="name"></label>
                        <input type="hidden" name="pro_id" value="{{ $data->id }}">
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <input type="text" name="feature_tag[]" class="form-control" value="{{ $item->tag }}" placeholder="Feature Tag">
                    </div>
                    <div class="col-md-4">
                        <label for="color_qty"> </label>
                        <input type="text" name="feature_value[]" class="form-control" value="{{ $item->value }}" placeholder="Feature Value">
                    </div>
                    <div class="col-md-2">
                        <label for="color_price"></label>
                        <button type="button" class="btn btn-danger btn-sm mt-4 removefeature">X</button>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div id="mainfeature">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <label for="name"></label>
                        <input type="hidden" name="pro_id" value="{{ $data->id }}">
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
            @endif

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
    <div class="text-center">
        <button type="submit" class="btn btn-primary waves-effect">Update</button>
    </div>
</form>
