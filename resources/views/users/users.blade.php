@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">

  <div class="col-md-6">
    <h2>Users</h2>
  </div>
  <div class="col-md-6 text-right mb-3">
    <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New user</a></div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All user</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="text-center">
          <tr>
            <th>Id</th>
            <th>Group</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone </th>
            <th>Address</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)

          <tr>
            <td>{{$user -> id }}</td>
            <td>{{$user -> group -> title }}</td>
            <td>{{$user -> name }}</td>
            <td>{{$user -> email }}</td>
            <td>{{$user -> phone }}</td>
            <td>{{$user -> address }}</td>
            <td class="custom">
              <form action="{{route('users.destroy',['user' => $user->id ])}}" method="POST">
                <a class="btn btn-primary " href="{{route('users.edit',['user' => $user->id])}}"><i class="fa fa-edit"></i> </a>
                <a class="btn btn-primary " href="{{route('users.show',['user' => $user->id])}}"><i class="fa fa-eye"></i> </a>
                {{-- @if($users->sales()->count() == 0
                && $users->purchases()->count() == 0
                && $users->receipts()->count() == 0
                && $users->payments()->count() == 0
                ) --}}

                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                {{-- @endif --}}
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
