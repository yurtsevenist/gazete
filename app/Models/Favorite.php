<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $guarded = [];
    function getNews()
    {
       
           return $this->hasOne('App\Models\Menu','id','fav_id');      
       
   }
   function getWriters()
   {
      
          return $this->hasOne('App\Models\Writer','id','fav_id');      
      
  }
}
