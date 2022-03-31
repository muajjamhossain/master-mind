<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryBanner extends Model
{
    protected $fillable =
    [
        'title','slug','button','url','publish','status','image','discount'
    ];
}
