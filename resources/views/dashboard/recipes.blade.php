@extends('dashboard.dashboard')
@section('inner-content')

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Recipe With Full Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Recipe Name</th>
                  <th>Recipe Price</th>
                  <th>Print</th>
                  <th>Delete</th>
                </tr>
                </thead>
                @if($recipe_datas !=null)
                <tbody>
                  @foreach ($recipe_datas as $recipe_data)
                <tr>
                  <td>{{$recipe_data['recipe_name']}}</td>
                  <td>{{number_format($recipe_data['recipe_price'],2)}}</td>
                  <td><a href="/print/{{$recipe_data['id']}}/" class="btn btn-success">print</td></td>
                     <td><a href="/recipe-details-delete/{{$recipe_data['id']}}/" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this record?')">delete</td></td>
                  </tr>
                  @endforeach
                 </tbody>
                  @endif
              </table>
               <?php echo $recipe_datas->render(); ?>
            </div>
           
</div>

@endsection