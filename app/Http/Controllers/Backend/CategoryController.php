<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index(){
    //  dd('ok');
      $data['allData']=Category::all();
      return view('backend.category.view-category',$data);

    }

    public function add(){
      return view('backend.category.view-category');
    }

    public function store(Request $request){

      //dd('ok');
      $this->validate($request,[
        'name' => 'required|unique:categories,name'
      ]);
      $data =new Category();
      $data->name =$request->name;
      if($request->file('image')){
          $file= $request->file('image');
          $fileName=date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/category_images'),$fileName);
          $data['image']=$fileName;
        }
      $data->save();
      $notification=array(
                        'message'=>'Category Added Successfully',
                          'alert-type'=>'success'
                        );
                      return redirect()->route('categories.view')->with($notification);
    }


      public function edit($id){
        $editData=Category::find($id);
        return view('backend.category.edit-category' ,compact('editData'));
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
