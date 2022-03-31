<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable =
    ['name','designation','details','facebook','twitter','linked','pinterest','google','youtube','slug','image','status'
    ];
}
