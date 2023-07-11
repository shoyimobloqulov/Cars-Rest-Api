<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addPage extends Model
{
    use HasFactory;
    protected $fillable = ['desc','url','title','image'];
}
