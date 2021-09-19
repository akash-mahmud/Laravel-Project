@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">

  <div class="col-md-6">
    <h2>Categories</h2>
  </div>
  <div class="col-md-6 text-right mb-3">
    <a href="{{route('categories.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Category</a></div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All category</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="text-center">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>

          @foreach($categories as $category)

          <tr>
            <td>{{$category ->id }}</td>
            <td>{{$category->title }}</td>
            <td class="category">
              <form action="{{route('categories.destroy',['category' => $category->id ])}}" method="POST">
                <a class="btn btn-primary " href="{{route('categories.edit',['category' => $category->id])}}"><i class="fa fa-edit"></i> </a>
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

@stop
