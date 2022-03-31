@extends('admin.layouts.app')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li class="active">View</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i>{{$data->name }} View</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{route('products')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> All Products</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
               <div class="row">
                <div class="col-sm-6">
                    <h4>Product Information</h4>
                    <hr>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Product Name: </label>
                        <div class="col-sm-8">
                            {{ $data->name }}
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">SKU: </label>
                        <div class="col-sm-8">
                            {{ $data->sku }}
                        </div>
                    </div>
                    @if ($data->product_condition != '')
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Condition: </label>
                        <div class="col-sm-8">
                            {{ $data->product_condition }}
                        </div>
                    </div>
                    @endif
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Category: </label>
                        <div class="col-sm-8">
                            @foreach ($data->categories as $category)
                            <span class="badge badge-info">{{ $category['name'] }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Description: </label>
                        <div class="col-sm-8">
                           {{ $data->description }}
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Selling Price: </label>
                        <div class="col-sm-8">
                           {{ $data->selling_price }} {{ config('settings.currency_symbol') }}
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Discount Price: </label>
                        <div class="col-sm-8">
                           {{ $data->discount_price ? : ''}} {{ config('settings.currency_symbol') }}
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Stock Quantity: </label>
                        <div class="col-sm-8">
                           {{ $data->stock ? : ''}}
                        </div>
                    </div>
                   @if ($data->tags  != '')
                   <div class="form-group row custom_form_group">
                    <label class="col-sm-4 control-label">Tags: </label>
                    @php
                        $tag = explode(',',$data->tags);
                    @endphp
                    <div class="col-sm-8">
                        @foreach ($tag as $item)
                        <span class=" badge badge-warning">{{ $item }}</span>
                        @endforeach
                    </div>
                   </div>
                   @endif
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Meta Tag: </label>
                        <div class="col-sm-8">
                           {{ $data->meta_tag ? : ''}}
                        </div>
                    </div>

                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Meta Description: </label>
                        <div class="col-sm-8">
                           {{ $data->meta_description ? : ''}}
                        </div>
                    </div>
                    @if ($data->policy != '')
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Product Policy </label>
                        <div class="col-sm-8">
                           {{ $data->policy ? : ''}}
                        </div>
                    </div>
                    @endif
                    @if ($data->youtube != '')
                        <div class="form-group row custom_form_group">
                            <label class="col-sm-4 control-label">Product Video URL </label>
                            <div class="col-sm-8">
                            {{ $data->youtube ? : ''}}
                            </div>
                        </div>
                    @endif
                    @if ($data->type == 'physicale')
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Product Measeurement </label>
                        <div class="col-sm-8">
                        {{ $data->measure ? : ''}}
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-4 control-label">Shipping Time </label>
                        <div class="col-sm-8">
                        {{ $data->ship_time ? : ''}}
                        </div>
                    </div>
                    @endif
                    <hr>
                    @if (count($data->colors) == 0)
                    @else
                    <h5 class="ml-5">Product Color </h5>
                    <hr>
                   <div class="row">
                    <div class="col-sm-1"><b></b></div>
                    <div class="col-sm-3"><b>Name</b></div>
                    <div class="col-sm-4"><b>Quantity</b></div>
                    <div class="col-sm-4"><b>Price</b></div>
                    @foreach ($data->colors as $item)
                    <div class="col-sm-1"><b></b></div>
                    <div class="col-sm-3">{{ $item->name }}</div>
                    <div class="col-sm-4">{{ $item->qty }}</div>
                    <div class="col-sm-4">{{ $item->price }}</div>
                    <hr>
                    @endforeach
                    </div>
                   @endif
                   <hr>
                    @if (count($data->sizes) == 0)
                    @else
                    <h5 class="ml-5">Product Size </h5>
                    <hr>
                   <div class="row">
                    <div class="col-sm-1"><b></b></div>
                    <div class="col-sm-3"><b>Name</b></div>
                    <div class="col-sm-4"><b>Quantity</b></div>
                    <div class="col-sm-4"><b>Price</b></div>
                    @foreach ($data->sizes as $item)
                    <div class="col-sm-1"><b></b></div>
                    <div class="col-sm-3">{{ $item->name }}</div>
                    <div class="col-sm-4">{{ $item->qty }}</div>
                    <div class="col-sm-4">{{ $item->price }}</div>
                    <hr>
                    @endforeach
                    </div>
                   @endif
                </div>
                <div class="col-sm-6">
                    <h4>Product Thumbnail image</h4>
                    <hr>
                    <div class="row">
                        <img class="col-sm-6" src="{{ URL::to($data->image) }}" alt="">
                    </div>

                    <h4>Product Gallery</h4>
                    <hr>
                    <div class="row">
                        @foreach ($data->images as $item)
                        <img class="col-sm-4" src="{{ URL::to($item->gallery) }}" alt="">
                        @endforeach
                    </div>


                    @if (count($data->wholesales) == 0)
                    @else
                    <hr>
                    <h5 class="ml-5">Product Whole Sale </h5>
                    <hr>
                   <div class="row">
                    <div class="col-sm-2"><b></b></div>
                    <div class="col-sm-5"><b>Quantity</b></div>
                    <div class="col-sm-5"><b>Discount</b></div>
                    @foreach ($data->wholesales as $item)
                    <div class="col-sm-2"><b></b></div>
                    <div class="col-sm-5">{{ $item->qty }}</div>
                    <div class="col-sm-5">{{ $item->discount }}</div>
                    <hr>
                    @endforeach
                    </div>
                   @endif

                    @if (count($data->featuretags) == 0)
                    @else
                    <hr>
                    <h5 class="ml-5">Product Features Tags </h5>
                    <hr>
                   <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5"><b>Tags</b></div>
                    <div class="col-sm-5"><b>Value</b></div>
                    @foreach ($data->featuretags as $item)
                    <div class="col-sm-2"><b></b></div>
                    <div class="col-sm-5">{{ $item->tag }}</div>
                    <div class="col-sm-5">{{ $item->value }}</div>
                    <hr>
                    @endforeach
                    </div>
                   @endif

                    @if (count($data->licenses) == 0)
                    @else
                    <hr>
                    <h5 class="ml-5">Product license </h5>
                    <hr>
                   <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5"><b>Key</b></div>
                    <div class="col-sm-5"><b>Quantity</b></div>
                    @foreach ($data->licenses as $item)
                    <div class="col-sm-2"><b></b></div>
                    <div class="col-sm-5">{{ $item->key }}</div>
                    <div class="col-sm-5">{{ $item->qty }}</div>
                    <hr>
                    @endforeach
                    </div>
                   @endif

                </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection

