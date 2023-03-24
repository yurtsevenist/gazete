<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getMenu()
    {
        return $this->hasMany('App\Models\Menu','cat_id','id')->orderBy('pop','DESC');
    }
}
