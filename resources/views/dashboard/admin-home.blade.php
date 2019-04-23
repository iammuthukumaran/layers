@extends('dashboard.dashboard')
@section('inner-content')
 <!-- Content Header (Page header) 
 <section class="content-header">
 </section>
 <section class="content">
 </section> -->

 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add the Product And it's Price</h3>
            </div>
            <!-- /.box-header -->
           <?php // print_r ($layers); die(); ?>
            <div class="box-body">
              <form role="form" method="POST" action="/store">
              	{{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" class="form-control" placeholder="Product Name" name="product_name" {{$errors->has('product_name') ?  'alert alert-danger' : ''}}" value="{{ old('name') }}">
                </div>  
                 <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" placeholder="Enter Price" name="product_price"  {{$errors->has('product_price') ?  'alert alert-danger' : ''}}" value="{{ old('price') }}">
                </div>                 
                      
             <button type="submit" class="btn btn-block btn-primary btn-lg">Add Product</button>                   
              </form>
            </div>
            <!-- /.box-body -->
            @if ($errors->any())
	<div class="alert alert-danger">
		
		<ul>
			 @foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
		
	</div>
	@endif
          </div>

          <h2>Products details</h2>
          <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
     @foreach ($layers as $layer)
   
      <tr>
        <td>{{$layer['product_name']}}</td>
        <td>{{$layer['product_price']}}</td>
        
          <td><a href="edit/{{$layer['id']}}/" class="btn btn-success">edit</td>
            <td><a href="delete/{{$layer['id']}}" onclick="return confirm('Are you sure want to delete this record?')" class="btn btn-danger">delete</td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection
