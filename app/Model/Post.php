<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Post extends Model
{
    public function posts(){
      return $this->belongsTo(Category::class,'category_id','id');
    }
}
