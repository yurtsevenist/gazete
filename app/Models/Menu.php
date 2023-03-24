<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    function getCat()
    {
       
           return $this->hasOne('App\Models\Category','id','cat_id');      
       
    }
    public function getYazars()
    {
        return $this->hasMany('App\Models\Writer','news_id','id');
    }
}
