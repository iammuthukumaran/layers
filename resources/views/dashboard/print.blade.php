  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="container">
            <div class="box-header">
              <h3 class="box-title">Product Full Details</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>Recipe name: {{$datas->recipe_name}}</th>
                  <th>Recipe price :{{number_format($datas->recipe_price,2)}}</th>
                </tr>
                  
                <tr>
                  
                  <th>Product Name</th>
                  <th>Product Price Per KG/Litter</th>
                  <th>Product Quantity</th>
                  <th>Product Rate</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($datas['RecipeSub'] as $data)
                  <tr>
                    
                    
                     
                  <td>{{\App\Layer::where('id',$data['product_name'])->value('product_name')}}</td>
                  <td>{{number_format($data['rate_per_kg'],2)}}</td>
                  <td>{{number_format($data['quantity'],2)}}</td>
                  <td>{{number_format($data['rate'],2)}}</td>
                  
                  </tr>
                  @endforeach
                 </tbody>
              </table>
            </div>