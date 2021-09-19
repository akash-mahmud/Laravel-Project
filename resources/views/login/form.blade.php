@extends('layout.primary')
@section('auth')


<body>

  <div class="container">
    @if($errors -> any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors -> all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-2 d-none d-lg-block "></div>
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  {!! Form::open(['route' => 'login.confirm','method'=> 'post','class' => 'user']) !!}
                  <div class="form-group">

                    {!! Form::email('email', Null, ['class' => 'form-control form-control-user form-control','id'=>'email','placeholder' => 'Enter Email Address...']) !!}
                  </div>
                  <div class="form-group">

                    {!! Form::password('password', ['class' => 'form-control form-control-user form-control','id'=>'password','placeholder' => 'password']) !!}

                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary  btn-user btn-block logout">Login</button>



                  {!! Form::close() !!}


                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

@stop
