<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeIcon extends Model
{
    use HasFactory;

    protected $fillable = ['photo','photo_active','content'];
}
