<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\ProductCategory;
class Product extends Model
{
    protected $fillable = ['name', 'image', 'description','slug',
    'selling_price','discount_price','stock','policy','featured','status', 'views','tags','best','product_type',
    'top','hot','latest','big','features','user_id','product_condition','ship','meta_tag','meta_description','youtube',
    'type','file','license','license_qty','link','platform','region','licence_type','measure'];

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = $value;
    //     $this->attributes['slug'] = \Str::slug($value);
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }
    public function wholesales()
    {
        return $this->hasMany(ProductWholeSell::class, 'product_id');
    }
    public function featuretags()
    {
        return $this->hasMany(ProductFeatureTag::class);
    }
    public function licenses()
    {
        return $this->hasMany(ProductLicense::class);
    }
}
