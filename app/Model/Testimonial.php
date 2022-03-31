<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable =
    [
        'name', 'designation', 'review','slug','company','status','image'
    ];
}
