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
              <h3>Posts list
                <a class="btn btn-success float-right" href="{{route('posts.add')}}"> <i class="fa fa-plus-circle"></i> Add Post</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key=>$post)
                  <tr>
                    <td>{{$key+1}}</td>
                      <td>{{$post['posts']['name']}}</td>
                      <td>{{$post->title}}</td>
                      <td>{{$post->content}}</td>
                      <td><img src="{{(!empty($post->image)?url('public/upload/posts_image/'.$post->image):url('public/upload/no-image.jpg'))}}"
                         style="width: 70px;height: 80px;border: 1px solid #000" alt="">
                      </td>
                      <td>{{$post->date}}</td>
                      <td> <a title="edit" class="btn btn-sm btn-primary" href="{{route('posts.edit',$post->id)}}"> <i class="fa fa-edit"> </i> </a>
                        <a title="delete" id="delete" class="btn btn-sm btn-danger" href="{{route('posts.delete',$post->id)}}"> <i class="fa fa-trash"> </i></a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

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

@endsection
