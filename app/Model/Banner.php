<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Image;
class Banner extends Model
{
    protected $fillable =
    [
        'title','slug','details','button','button_url','publish','status','image','discount'
    ];

    // public function setImageAttribute($value)
    // {
    //     $this->attributes['image'] = $value;
    //     if($value != ''){
    //         $image_name= hexdec(uniqid()).'.'.$value->getClientOriginalExtension();
    //         Image::make($value)->resize(1349,562)->save('public/uploads/banner/'.$image_name);
    //         return $this->attributes['image'] ='public/uploads/banner/'.$image_name;
    //     }

    // }
}
