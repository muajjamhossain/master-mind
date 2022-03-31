<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    use HasRoles;


    protected $fillable =[
        'firstname','email','lastname','phone','address_1','address_2','country','city','postcode','status'
    ];
    public function getFullNameAttribute()
    {
    return $this->firstname. ' '. $this->lastname;
    }
}
