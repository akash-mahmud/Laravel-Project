@extends('users.user_layout')
@section('user_content')


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">purchases of <strong>{{$user ->name}}</strong></h6>
  </div>
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="text-center">
          <tr>
            <th>Challen No</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Total</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user ->purchases as $purchase)

          <tr>

            <td>{{$purchase -> challan_no }}</td>
            <td>{{$user -> name }}</td>
            <td>{{$purchase ->date}}</td>
            <td>400</td>


            <td class="custom">
              <form action="{{route('users.destroy',['user' => $user->id ])}}" method="POST">

                <a class="btn btn-primary " href="{{route('users.show',['user' => $user->id])}}"><i class="fa fa-eye"></i> </a>

                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


  </div>


</div>


</div>


@stop
