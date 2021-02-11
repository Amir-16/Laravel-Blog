@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category </li>
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
          <div class="card-header">
            <h3 class="float-right">Category list </h3>
              <!-- modal -->
                  <div class="container">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Category</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Category</h4>
                          </div>
                          <div class="modal-body">
                            <form  action="{{route('categories.store')}}" method="post" id="myform" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group ">
                                <label for="">Category Name</label>
                                <input type="text" name="name" class="form-control form-control-sm">
                                <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}
                                </font>
                              </div>
                              <div class="form-group ">
                                <label for="">Image</label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm">
                              </div>
                              <div class="form-group" >s
                                  <img id="showImage" src="{{url('public/upload/no-image.jpg')}}"
                                  style="width: 70px;height: 80px; border:1px solid #000000">
                                </div>
                              <div class="form-group col-md-4">
                                <button type="submit" name="button" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <form action="{{route('categories.update',$editData->id)}}" id="myform" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name"> Category Name</label>
                <input type="text" name="name" value="{{$editData->name}}"  class="form-control">
                  <font style="color:red"> {{($errors->has('name'))?($errors->first('name')):''}}</font>
              </div>
              <div class="form-group col-md-6">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control form-control-sm">
              </div>

                <div class="form-group col-md-2" >
                <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/category_images/'.$editData->image):url('public/upload/no-image.jpg')}}"
                style="width: 150px;height: 160px; border:1px solid #000000">
                </div>

                <div class="form-group col-md-2" style="padding-top: 30px">
                  <input type="submit" value="Update" class="btn btn-primary">
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
  $('#myform').validate({
    rules: {
      name: {
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
