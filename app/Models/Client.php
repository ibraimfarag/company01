<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','photo','client_category_id','url'];

    public function category(){
        return $this->hasOne('App\Models\ClientCategory','id','client_category_id');
    }

}
