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
<body onload='document.form1.text1()'>
<form name="form1" action="#">
   
 <!-- <input type="text" id="product_name" placeholder="product name"> -->
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Recipe Details</h3>
            </div>
            <div class="box-body">
              
 <div class="row" id="validate">

 <div class="col-md-3">
  <label>Product Name</label>
 @if($layers !=null)
 <select id="product_name" name="product_name" class="form-control">
  <option>Select Product</option>
  @foreach ($layers as $layer)

  <option value="{{$layer['id']}}" >{{$layer['product_name']}}</option>
   @endforeach
   </select>
   @endif
 </div>



 <div class="col-md-3">
   <label>Rate Per KG/Litter</label>
  <input type="text" id="rate_perkg" placeholder="Rate Per KG/Litter" class="form-control" name='rate_perkg' readonly required>
 </div>
<div class="col-md-3">
  <label>Quantity</label>
  <input type="text" id="quantity" placeholder="Quantity" class="form-control allownumericwithoutdecimal" name='quantity'/>
 </div>
  <div class="col-md-3">
    <label>Rate</label>
  <input type="text" id="rate"  placeholder="Rate" class="form-control" name='rate' readonly required>
 </div>
  
</div>
<br>
<input type="button" class="add-row btn btn-block btn-primary btn-lg" value="Add Row" onclick="allnumericplusminus()" />
</form>
</div>
</div>
<div class="box box-info">
   <div class="box-header with-border">
              <h3 class="box-title">Recipe Details</h3>
            </div>
            <div class="box-body">
<form action="/daily-entry" method="POST" id="form2" >
  {{ csrf_field() }}
  <div class="formsbt">


    <label>Recipe Name</label><input type='text' id="recipe_name" name='recipe_name' class='form-control' {{$errors->has('recipe_name') ?  'alert alert-danger' : ''}}" value="{{ old('recipe_name') }}"><br>
    <div class="row">
     <div class="col-md-2"><label>delete</label></div>
   <div class="col-md-2"><label>Product Name</label></div>
   <div class="col-md-2"><label>Rate Per KG/Litter</label></div>
   <div class="col-md-2"><label>Quantity</label></div>
   <div class="col-md-2"><label>Rate</label></div>
   <div class="col-md-2"></div></div><br>
    
  </div>
  <div class="row">
  <div class="col-md-12"><label>Total Amount</label> : 
  <input type="text" name='recipe_price' readonly value="0" id="total_amnt" class='form-control' {{$errors->has('recipe_price') ?  'alert alert-danger' : ''}}" value="{{ old('recipe_price') }}"><br></div></div>
  <button type="submit" class="btn btn-block btn-primary btn-lg" id="recipe_pricesbt"  />submit</button><br>

  </form>
<button type="button" class="delete-row btn btn-block btn-danger btn-lg">Delete Row</button><br>
</div></div>

  @if ($errors->any())
  <div class="alert alert-danger">
    
    <ul>
       @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    
  </div>
  @endif





<script>
function allnumericplusminus()
   {
    //$('#rate').val('');
      var numbers = /(?=[^\0])(?=^([0-9]+){0,1}(\.[0-9]{1,2}){0,1}$)/;
      var rate_perkg = document.getElementById("rate_perkg").value;
var quantity = document.getElementById("quantity").value;
var raterate = document.getElementById("rate").value;

      if(rate_perkg.match(numbers) && quantity.match(numbers) && raterate.match(numbers) )
      {
       // $("#product_name option:selected").val('s');
     var product_name = $("#product_name option:selected").text();
      var product_id = $("#product_name").val();
    var rate_perkg = $("#rate_perkg").val();
    var quantity = $("#quantity").val();
     var rate = $("#rate").val();
     $('#rate_perkg').val('');
     $('#quantity').val('');
      

     

    

  
     
    var markup = "<div class='row dlt'><div class='col-md-2'><input type='checkbox'  name='record'></div><div class='col-md-2'><input type='hidden' value="+ product_id + " name='product_name[]'><input type='text' value="+ product_name + " class='form-control'></div><div class='col-md-2'><input type='text' value="+ Number (rate_perkg).toFixed(2) + " name='rate_per_kg[]' class='form-control' readonly></div><div class='col-md-2'><input type='text' value="+ Number (quantity).toFixed(2)  + " name='quantity[]' class='form-control' readonly></div><div class='col-md-2'><input type='text' value="+ rate + " name='rate[]' class='form-control total_rate' readonly></div></div><br>"; 
    $(".formsbt").append(markup);
      return true;
      }
      else
      {
      alert('Please fill all inputs');
    $('#rate').val('');
      return true;
      }
   }
</script>
<script>
$(document).ready(function() {
  
  $(".add-row").click(function() {

    
  });

  // Find and remove selected table rows
$(".delete-row").click(function() {
$(".formsbt").find('input[name="record"]').each(function() {

if ($(this).is(":checked")) {
//alert();
 $(this).parents(".dlt").remove();
}
});
var sum=0;
$('.total_rate').each(function() {

sum +=Number($(this).val());
});
$('#total_amnt').val(Number(sum).toFixed(2));
});
}); 

/*

$(".delete-row").click(function() {
$(".formsbt").find('input[name="record"]').each(function() {

if ($(this).is(":checked")) {
//alert();
$(this).parent(".dlt").parent(".dlts").remove();
}
});
var sum=0;
$('.total_rate').each(function() {

sum +=Number($(this).val());
});
$('#total_amnt').val(sum);
});*/


    $('#product_name').change(function(){
    var product_name = $(this).val();    
    if(product_name){
        $.ajax({
           type:"GET",
           url:"{{url('layers/get-product-list')}}",
           data:{"id":product_name},
           success:function(res){  
                        
            if(res){
              $('#rate').val('');
              $("#quantity").val('');
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

          $('#rate').val(Number(total).toFixed(2));
    });
});


$(document).ready(function(){
  $(".add-row").click(function(){

var rate=$('#rate').val();
var tot=$('#total_amnt').val();
var numbers = /(?=[^\0])(?=^([0-9]+){0,1}(\.[0-9]{1,2}){0,1}$)/;
if(rate.match(numbers)){
//if(rate!=numbers(rate)){
var sum=0;
var sum=parseFloat(tot)+parseFloat(rate);
if(isNaN)
          $('#total_amnt').val(Number(sum).toFixed(2));
      }
    });
});

$(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           var $this = $(this);
    $this.val($this.val().replace(/[^\d.]/g, '')); 
        });
/*
$(document).ready(function() {
  
  $("#recipe_pricesbt").click(function() {
    var recipe_name=$('#recipe_name').val();
    if(recipe_name === null){
      alert(recipe_name);
    }
    
  });
}); */


$('#form2').submit(function () {

    // Get the Login Name value and trim it
    var recipe_name = $.trim($('#recipe_name').val());

    // Check if empty of not
    if (recipe_name === '') {
        alert('Please Enter the Recipe Name.');
        return false;
    }
});


</script>


@endsection