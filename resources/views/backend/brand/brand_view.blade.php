@extends('admin.admin_master')
@section('admin')

<div class="container-full">
  <!-- Main content -->
  <section class="content">
    <div class="row">

    <div class="col-8">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Brand List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Brand En</th>
              <th>Brand Sv</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($brands as $item)
            <tr>
              <td>{{$item->brand_name_en}}</td>
              <td>{{$item->brand_name_sv}}</td>
              <td><img src="{{asset($item->brand_image)}}" width="70" height="40"></td>
              <td>
                <a href="{{route('brand.edit', $item->id)}}" class="btn btn-info" title="Edit Brand">
                  <i class="fa fa-pencil"></i></a>
                <a href="{{route('brand.delete', $item->id)}}" id="delete" class="btn btn-danger" title="Delete Brand">
                  <i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach

          </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->


    <!-- Add Brand Page -->
    <div class="col-4">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Add Brand</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="table-responsive">
          <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <h5>Brand Name English <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="brand_name_en" class="form-control">
                @error('brand_name_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <h5>Brand Name Swedish <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="brand_name_sv" class="form-control">
                @error('brand_name_sv')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <h5>Brand Image <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="file" name="brand_image" class="form-control">
                @error('brand_image')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Brand">
            </div>
           </form>
         </div>
       </div>
       <!-- /.box-body -->
       </div>
       <!-- /.box -->
     </div>
     <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

  </div>

@endsection