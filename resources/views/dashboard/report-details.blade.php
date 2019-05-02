@extends('dashboard.dashboard')
@section('title', 'Add Products')
@section('inner-content')
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recipe With Full Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
           <p> The Details between <b> <?php echo ($input['from']); ?></b> and <b><?php echo ($input['to']); ?></b>.
                <tr>
                  <th>Recipe Name</th>
                  <th>Recipe Price</th>
                  <th>Print</th>
                  <th>Delete</th>
                </tr>
                </thead>
                @if($recipe_details !=null)
                <tbody>
                  @foreach ($recipe_details as $recipe_detail)
                <tr>
                  <td>{{$recipe_detail['recipe_name']}}</td>
                  <td>{{number_format($recipe_detail['recipe_price'],2)}}</td>
                  <td><a href="/print/{{$recipe_detail['id']}}/" class="btn btn-success">print</td></td>
                     <td><a href="/recipe-details-delete/{{$recipe_detail['id']}}/" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this record?')">delete</td></td>
                  </tr>
                  @endforeach
                 </tbody>
                 
                  @else
                  <p><b> There are No Records Found</b> </p>
                   @endif
              </table>
               <?php //echo $recipe_datas->render(); ?>
            </div>
           
</div>
      @endsection