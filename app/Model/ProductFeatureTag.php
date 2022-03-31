<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductFeatureTag extends Model
{
    protected $fillable =[
        'product_id','features'
     ];
}
