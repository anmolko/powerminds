<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $table ='awards';
    protected $fillable =['id','name','subtitle','image','created_by','updated_by'];
}
