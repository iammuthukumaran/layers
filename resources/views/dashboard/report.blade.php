@extends('dashboard.dashboard')
@section('title', 'Add Products')
@section('inner-content')

<div class="box box-info field">
            <div class="box-header with-border">
              <h3 class="box-title">Select date</h3>
            </div>
            <div class="box-body">
<div class="form-group">
	<form action="/get-report" method="POST" id="">
		  	{{ csrf_field() }}
                <label>Date From:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="from_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Date To:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="to_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required>
                </div>
                <!-- /.input group -->
              </div>
              <button type="submit" class="btn btn-block btn-primary btn-lg" id="recipe_pricesbt">submit</button>
          </form>
          </div>
      </div>



      @endsection