<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryAdvertisment extends Model
{
    protected $fillable =
    [
        'title','slug','button','url','publish','status','image','discount'
    ];
}
