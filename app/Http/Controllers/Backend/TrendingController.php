<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;
use App\Model\Trend;
use Auth;
use DB;
class TrendingController extends Controller
{
  public function index(){
      //  dd('ok');
        $data['allData']=Trend::orderBy('id','desc')->get();
        return view('backend.trend.view-trend',$data);

  }

  public function add(){
        // $data['categories']=Category::all();
        return view('backend.trend.add-trend');
  }

  public function store(Request $request){

          $data =new Trend();
          $data->title =$request->title;
          $data->content= $request->content;
          $data->date =$request->date;
          if($request->file('image')){
              $file= $request->file('image');
              $fileName=date('YmdHi').$file->getClientOriginalName();
              $file->move(public_path('upload/trends_image'),$fileName);
              $data['image']=$fileName;
            }
          $data->save();
          $notification=array(
                            'message'=>'Trend Added Successfully',
                              'alert-type'=>'success'
                            );
                          return redirect()->route('trends.view')->with($notification);
  }


    public function edit($id){
      // $data['categories']=Category::all();
      $data['editData'] =Trend::where('id',$id)->first();
      return view('backend.trend.add-trend' ,$data);
    }

    public function update(Request $request,$id){
      //dd('ok');

            $data =Trend::find($id);
            $data->title =$request->title;
            $data->content= $request->content;
            $data->date =$request->date;
            if($request->file('image')){
                $file= $request->file('image');
                @unlink(public_path('upload/trends_image/'.$date->image));
                $fileName=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/trends_image'),$fileName);
                $data['image']=$fileName;
              }
            $data->save();
            $notification=array(
                              'message'=>'Trends Updated Successfully',
                                'alert-type'=>'success'
                              );
                            return redirect()->route('posts.view')->with($notification);

    }

    public function delete($id){
          $trend= Trend::find($id);
          $trend->delete();
          $notification=array(
                            'message'=>'Category deleted Successfully',
                              'alert-type'=>'error'
                            );
                          return redirect()->route('trends.view')->with($notification);
    }
}
