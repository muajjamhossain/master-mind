<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{

    protected $fillable =
    [
        'name','image','slug','remarks','status'
    ];



}
