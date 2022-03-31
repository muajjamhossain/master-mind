<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable =[
        'name','slug','creator','status','image',
    ];

    public function creatorby()
    {
      return $this->belongsTo('App\Model\Admin', 'creator','id');
    }
}
