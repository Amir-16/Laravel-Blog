<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;
use Auth;
use DB;
class PostController extends Controller
{
  public function index(){
  //  dd('ok');
    $data['allData']=Post::with(['posts'])->orderBy('id','desc')->get();
    return view('backend.post.view-post',$data);

  }

  public function add(){
    $data['categories']=Category::all();
    return view('backend.post.add-post',$data);
  }

  public function store(Request $request){

    $data =new Post();
    $data->category_id =$request->category_id;
    $data->user_id=Auth::user()->id;
    $data->title =$request->title;
    $data->content= $request->content;
    $data->date =$request->date;
    if($request->file('image')){
        $file= $request->file('image');
        $fileName=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/posts_image'),$fileName);
        $data['image']=$fileName;
      }
    $data->save();
    $notification=array(
                      'message'=>'Posts Added Successfully',
                        'alert-type'=>'success'
                      );
                    return redirect()->route('posts.view')->with($notification);
  }


    public function edit($id){
      $data['categories']=Category::all();
      $data['editData'] =Post::where('id',$id)->first();
      return view('backend.post.add-post' ,$data);
    }

    public function update(Request $request,$id){
      //dd('ok');

      $data =category::find($id);
      $data->name =$request->name;
      if($request->file('image')){
          $file= $request->file('image');
          @unlink(public_path('upload/category_images/'.$date->image));
          $fileName=date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/category_images'),$fileName);
          $data['image']=$fileName;
        }
      $data->save();
      $notification=array(
                        'message'=>'Category Updated Successfully',
                          'alert-type'=>'success'
                        );
                      return redirect()->route('categories.view')->with($notification);

    }

    public function delete($id){
      $category= Category::find($id);
      $category->delete();
      $notification=array(
                        'message'=>'Category deleted Successfully',
                          'alert-type'=>'error'
                        );
                      return redirect()->route('categories.view')->with($notification);
    }
}
