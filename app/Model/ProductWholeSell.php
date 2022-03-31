<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductWholeSell extends Model
{
    protected $fillable =[
        'product_id','qty','discount'
     ];
}
