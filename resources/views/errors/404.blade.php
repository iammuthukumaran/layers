@extends('dashboard.dashboard')
@section('title', 'Add Product Details')
@section('inner-content')
<section class="content-header">
      <h1>
        404 Error Page
      </h1>
      
    </section>
<section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="{{ url('') }}">return to dashboard</a> or try using the search form.
          </p>

          
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
@endsection