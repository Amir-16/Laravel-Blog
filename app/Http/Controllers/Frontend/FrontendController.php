<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;
use App\Model\Trend;
use App\User;
class FrontendController extends Controller
{

    public function index(){
      $data['categories']=Category::all();
      $data['allposts']=Post::with(['user'])->latest()->take(9)->get();
      return view('frontend.single-page.index',$data);
    }

    public function contact(){
      return view('frontend.single-page.contact');
    }
    
    public function details($id){
      $data['details']=Post::with(['user'])->where('id',$id)->first();
      $data['randomPosts']=Post::all()->random(number:3);
      return view('frontend.single-page.details',$data);
    }

    public function Categories(){
      return view('frontend.single-page.category');
    }


}
