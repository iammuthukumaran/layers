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
  <select type="text" id="rate_perkg" placeholder="rate_perkg" class="form-control"></select>
 </div>
<div class="col-md-3">
  <input type="text" id="quantity" placeholder="quantity" class="form-control">
 </div>
  <div class="col-md-3">
  <input type="text" id="rate" placeholder="rate" class="form-control">
 </div>
  
</div>
<br>
<input type="button" class="add-row btn btn-block btn-primary btn-lg" value="Add Row">
</form>
</div>
</div>
<table>
  <thead>
    <tr>  
      <th>Select</th>
      <th>product name</th>
      <th>quantity</th>
      <th>rate</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <input type="checkbox" name="record">
      </td>
      <td>Ghee</td>
      <td>500 g</td>
      <td>12</td>
    </tr>
  </tbody>
</table>
<button type="button" class="delete-row btn btn-block btn-primary btn-lg">Delete Row</button>
<script>
$(document).ready(function() {
  $(".add-row").click(function() {
    var product_name = $("#product_name").val();
    var quantity = $("#quantity").val();
     var rate = $("#rate").val();

    var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + product_name + "</td><td>" + quantity + "</td><td>" + rate + "</td></tr>";
    $("table tbody").append(markup);
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
           url:"{{url('layers/get-product-list')}}?id="+product_name,

           success:function(res){               
            if(res){
                $("#rate_perkg").empty();
                $("#rate_perkg").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#rate_perkg").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#rate_perkg").empty();
            }
           }
        });
    }else{
        $("#rate_perkg").empty();
        
    }      
   });
</script>
@endsection