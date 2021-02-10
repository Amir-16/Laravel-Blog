<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){
    //  dd('ok');
      return view('frontend.single-page.index');
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
