@extends('dashboard.dashboard')
@section('inner-content')
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
form {
  margin: 20px 0;
}
form input,
button {
  padding: 6px;
  font-size: 18px;
}
table {
  width: 100%;
  margin-bottom: 20px;
  border-collapse: collapse;
  background: #fff;
}
table,
th,
td {
  border: 1px solid #cdcdcd;
}
table th,
table td {
  padding: 10px;
  text-align: left;
}


</style>

</head>
<body>
<form>
   
 <!-- <input type="text" id="product_name" placeholder="product name"> -->
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Addon</h3>
            </div>
            <div class="box-body">
 <div class="row">
 <div class="col-md-3">
 @if($layers !=null)
 <select id="product_name" name="product_name" class="form-control">
  <option>select Product</option>
  @foreach ($layers as $layer)

  <option value="{{$layer['id']}}" >{{$layer['product_name']}}</option>
   @endforeach
   </select>
   @endif
 </div>



 <div class="col-md-3">
  <input type="text" id="rate_perkg" placeholder="rate_perkg" class="form-control" readonly>
 </div>
<div class="col-md-3">
  <input type="text" id="quantity" placeholder="quantity" class="form-control">
 </div>
  <div class="col-md-3">
  <input type="text" id="rate" placeholder="rate" class="form-control" readonly>
 </div>
  
</div>
<br>
<input type="button" class="add-row btn btn-block btn-primary btn-lg" value="Add Row">
</form>
</div>
</div>
<form action="/daily-entry" method="POST">
  {{ csrf_field() }}
  <div class="formsbt">
    cake:name<p><input type='text' name='recipe_name' class='form-control'></p>
    
  </div>
  <input type="text" name='recipe_price' readonly value="0" id="total_amnt" class='form-control'><br>
  <input type='submit' class='btn btn-block btn-primary btn-lg' value='Submit'><br>
</form>
<button type="button" class="delete-row btn btn-block btn-primary btn-lg">Delete Row</button>



<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Recipe Name</th>
                  <th>Recipe Price</th>
                  <th>Print</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($recipe_datas as $recipe_data)
                <tr>
                  <td>{{$recipe_data['recipe_name']}}</td>
                  <td>{{$recipe_data['recipe_price']}}</td>
                  <td><a href="/print/{{$recipe_data['id']}}/" class="btn btn-success">print</td></td>
                  </tr>
                  @endforeach
                 </tbody>
              </table>
            </div>
</div>
<script>
$(document).ready(function() {
  var i=1;
  $(".add-row").click(function() {
    var product_name = $("#product_name option:selected").text();
    var rate_perkg = $("#rate_perkg").val();
    var quantity = $("#quantity").val();
     var rate = $("#rate").val();

    
     
    var markup = "<div class='row'><div class='col-md-2'><input type='checkbox'  name='record'></div><div class='col-md-2'><input type='text' value="+ product_name + " name='product_name[]' class='form-control'></div><div class='col-md-2'><input type='text' value="+ rate_perkg + " name='rate_per_kg[]' class='form-control'></div><div class='col-md-2'><input type='text' value="+ quantity + " name='quantity[]' class='form-control'></div><div class='col-md-2'><input type='text' value="+ rate + " name='rate[]' class='form-control'></div></div><br>"; i++;
    $(".formsbt").append(markup);
    
  });

  // Find and remove selected table rows
  $(".delete-row").click(function() {
    $("table tbody").find('input[name="record"]').each(function() {
      if ($(this).is(":checked")) {
        $(this).parents("tr").remove();
      }
    });
  });
});



    $('#product_name').change(function(){
    var product_name = $(this).val();    
    if(product_name){
        $.ajax({
           type:"GET",
           url:"{{url('layers/get-product-list')}}",
           data:{"id":product_name},
           success:function(res){  
                        
            if(res){
                $("#rate_perkg").val('');
                $("#rate_perkg").val(res);           
            }else{
               $("#rate_perkg").val('');
            }
           }
        });
    }else{
        $("#rate_perkg").empty();
        
    }      
   });


   

    
</script>
@endsection


@section('javascript')

<script>
    
$(document).ready(function(){
  $("#quantity").keyup(function(){

var rate=$('#rate_perkg').val();
var quantity=$('#quantity').val();

          var total= parseFloat(rate)*parseFloat(quantity);

          $('#rate').val(total);
    });
});


$(document).ready(function(){
  $(".add-row").click(function(){

var rate=$('#rate').val();
var tot=$('#total_amnt').val();
var sum=0;
var sum=parseInt(tot)+parseInt(rate);

          $('#total_amnt').val(sum);
    });
});
</script>


@endsection