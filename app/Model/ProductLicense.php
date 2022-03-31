<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductLicense extends Model
{
    protected $fillable =[
        'product_id','license'
     ];
}
