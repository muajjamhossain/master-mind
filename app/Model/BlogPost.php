<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable =[
        'title','details','slug','status','publish','creator','image'
    ];

    public function blogcategory()
    {
        return $this->belongsTo('App\Model\BlogCategory');
    }
    public function creatorby()
    {
      return $this->belongsTo('App\Model\Admin', 'creator', 'id');
    }
}
