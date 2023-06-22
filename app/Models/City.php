<?php

namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class City extends Model
{
    use HasFactory;
    public function country(){
        return $this->belongsTo(Country::class);
}

    public function users(){
    return $this->hasMany(User::class);
}

}
