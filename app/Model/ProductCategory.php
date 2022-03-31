<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
class ProductCategory extends Model
{
   protected $fillable =[
       'product_id','category_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
