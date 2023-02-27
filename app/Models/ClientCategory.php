<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug'];

    public function clients(){
        return $this->hasMany('App\Models\Client', 'client_category_id','id');
    }
}
