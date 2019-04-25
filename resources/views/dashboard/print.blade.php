
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>product name</th>
                  <th>product price</th>
                </tr>
                  <tr>
                    <td>{{$datas->recipe_name}}</td>
                    <td>{{$datas->recipe_price}}</td>
                  </tr>
                <tr>
                  
                  <th>Recipe Name</th>
                  <th>Recipe Price</th>
                  <th>quantity</th>
                  <th>rate</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($datas['RecipeSub'] as $data)
                  <tr>
                    
                     
                  <td>{{$data['product_name']}}</td>
                  <td>{{$data['rate_per_kg']}}</td>
                  <td>{{$data['quantity']}}</td>
                  <td>{{$data['rate']}}</td>
                  
                  </tr>
                  @endforeach
                 </tbody>
              </table>
            </div>