<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntryItem extends Model
{
    protected $fillable = ['slug','value','form_entry_id'];
}
