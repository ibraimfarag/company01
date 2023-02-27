<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{

    protected $fillable = ['slug','title','page_id','content','order','image','is_visible','type'];

    public function page(){
        return $this->hasOne('App\Models\Page','id','page_id');
    }
}
