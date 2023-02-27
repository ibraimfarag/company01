<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','content','content_bottom'];

    public function items(){
        return $this->hasMany('App\Models\ServiceItem','service_id','id');
    }
}
