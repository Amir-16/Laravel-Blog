<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\User;

class Post extends Model
{
    public function posts(){
      return $this->belongsTo(Category::class,'category_id','id');
    }

    public function user(){
      return $this->belongsTo(User::class,'user_id','id');
    }
}
