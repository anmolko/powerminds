<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;
    protected $table ='press_releases';
    protected $fillable =['id','title','slug','description','status','image','created_by','updated_by'];

}
