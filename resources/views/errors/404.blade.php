@extends('layout.404')

@section('main_content')





<!-- 404 Error Text -->
<div class="text-center mt-5">
  <div class="error mx-auto" data-text="404">404</div>
  <p class="lead text-gray-800 mb-5">Page Not Found</p>

  <a href="{{url('users')}}">&larr; Back to Dashboard</a>
</div>




<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
@stop
