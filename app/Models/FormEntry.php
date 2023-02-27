<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    protected $fillable = ['ip','form'];

    public function items(){
        return $this->hasMany('App\Models\FormEntryItem');
    }
}
