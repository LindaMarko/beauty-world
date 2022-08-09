@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->

<div class="container-full">
<!-- Content Header (Page header) -->

<!-- Main content -->
	<section class="content">
		<div class="row">
      <div class="col-12">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Product List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Product Name En</th>
								<th>Product Brand</th>
								<th>Product Type </th>
								<th>Product Price </th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach($products as $item)
              <tr>
                <td>{{ $item->product_name_en }}</td>
                <td>{{ ucfirst($item->brand) }}</td>
                <td>{{ ucfirst($item->product_type) }}</td>
                <td>{{ $item->price }} {{ $item->price_sign }}</td>
                <td>
                  <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                  <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
		</div>
		<!-- /.row -->
  </section>
	<!-- /.content -->
</div>

@endsection