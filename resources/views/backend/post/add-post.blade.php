@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Post Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Post </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
                  <h3>@if(isset($editData))
                  Edit Post
                    @else
                  Add Post
                    @endif
                <a class="btn btn-success float-right" href="{{route('posts.view')}}"> <i class="fa fa-list"></i>View Posts </a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form action="{{(@$editData)?route('posts.update',$editData->id):route('posts.store')}}"
                 id="mydata" method="post" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" name="id" value="{{@$editData->id}}">
                          <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="name"> Category Name<font style="color:red">*</font> </label>
                    <select class="form-control" name="category_id">
                      <option value="">Select Category</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}"{{(@$editData->category_id ==$category->id)?"selected":""}}>{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name"> Title<font style="color:red">*</font> </label>
                    <input type="text" name="title"  value="{{@$editData->title}}" class="form-control form-group-sm" placeholder="Title">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="">Content</label>
                    <textarea name="content" rows="8"  id="content" cols="80"class="form-control">{{@$editData->content}}</textarea>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="date">Date <font style="color:red">*</font> </label>
                    <input type="date" name="date" value="{{@$editData->date}}" class="form-control form-group-sm" id="date">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="image">Image <font style="color:red">*</font> </label>
                    <input type="file" name="image" class="form-control form-group-sm" id="image">
                  </div>

                  <div class="form-group col-md-4" >
                  <img id="showImage" src="{{(!empty(@$editData->image))?url('public/upload/posts_image/'.$editData->image):url('public/upload/no-image.jpg')}}"
                  style="width: 100px;height: 110px; border:1px solid #000000">
                  </div>

                  <div class="form-group col-md-4" style="padding-top: 30px">
                    <button type="submit" class="btn btn-primary">{{(@$editData)?'Update':'Submit'}}</button>
                  </div>

                </div>
              </form>

          </div>
          <!-- /.card -->

          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
$(function () {
  $('#mydata').validate({
    rules: {
      category_id: {
        required: true,
      },
      title:{
        required: true,
      },
      content: {
        required: true,
      }
    },
    messages: {
      name: {
        required: "Please enter name",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>




@endsection
