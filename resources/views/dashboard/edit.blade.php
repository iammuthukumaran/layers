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
              <form role="form" method="POST" action="/{{$layer->id}}/dashboard/update/">
              	{{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" class="form-control" placeholder="Product Name" name="product_name" value="{{$layer['product_name']}}" {{$errors->has('product_name') ?  'alert alert-danger' : ''}}">
                </div>  
                 <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" placeholder="Enter Price" name="product_price" value="{{$layer['product_price']}}" {{$errors->has('product_price') ?  'alert alert-danger' : ''}}">
                </div>                 
                      
             <button type="submit" class="btn btn-block btn-primary btn-lg">update Product</button>                   
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

          



@endsection
