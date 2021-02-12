<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;
use App\Model\Trend;
class FrontendController extends Controller
{

    public function index(){
      $data['categories']=Category::all();
      $data['trends']=Trend::all();
      $data['allposts']=Post::with(['posts'])->get();
      return view('frontend.single-page.index',$data);
    }

    public function contact(){
      return view('frontend.single-page.contact');
    }
    public function Details(){
      return view('frontend.single-page.details');
    }

    public function Categories(){
      return view('frontend.single-page.category');
    }


}
