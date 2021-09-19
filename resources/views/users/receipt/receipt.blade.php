@extends('users.user_layout')
@section('user_content')


@if($errors -> any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors -> all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{$user ->name}}</strong></h6>
  </div>
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="text-center">
          <tr>
            <th>Customer</th>
            <th>Admin</th>
            <th>Date</th>
            <th>Total</th>
            <th>Actions</th>
            <th>Note</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="2" class="text-right">Total :</th>
            <td>{{$user ->receipts->sum('amount')}}</td>


            <td colspan="2"></td>



          </tr>
        </tfoot>
        <tbody>
          @foreach($user ->receipts as $receipt)

          <tr>

            <td>{{$user -> name }}</td>
            <td>{{optional($receipt ->admin) -> name }}</td>
            <td>{{$receipt ->date}}</td>
            <td>{{$receipt ->amount}}</td>
            <td>{{$receipt -> note }}</td>


            <td class="custom">
              <form method='POST' action="{{route('user.receipt.destroy',['id' => $user->id , 'receipt_id' => $receipt])}}" method="POST">



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


  @stop
