<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $fillable = ['title','desc','title1','desc1','title2','desc2','title3','desc3','title4','desc4','icon1','icon2','icon3','icon4'];
}
