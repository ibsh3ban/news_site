<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


use App\Models\City;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles;

    public function user(){
        return $this->morphOne(User::class,'actor','actor_type','actor_id','id');
    }
    // public function city(){
    //     return $this->belongsTo(City::class);

    //  }
}
