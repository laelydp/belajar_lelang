@extends('template.home')

@section('title', 'Error')
@section('content')
<section class="content">
    <div class="error-page">
      <h2 class="headline text-danger">403</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i> You don't have permission to access this.</h3>
          <strong>
          <h3>
           {{Auth::user()->level}} dilarang akses
          </h3>
          </strong>

      </div>
    </div>
    <!-- /.error-page -->

  </section>
@endsection
