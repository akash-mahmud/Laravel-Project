@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">

  <div class="col-md-6">
    <h2>products</h2>
  </div>
  <div class="col-md-6 text-right mb-3">
    <a href="{{route('products.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New product</a></div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All product</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="text-center">
          <tr>
            <th>Id</th>
            <th>Categoy </th>
            <th>Name</th>

            <th>Cost Price </th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)

          <tr>
            <td>{{$product ->id }}</td>
            <td>{{$product ->category ->title }}</td>
            <td>{{$product ->title }}</td>

            <td>{{$product ->cost_price }}</td>
            <td>{{$product ->price }}</td>

            <td class="product">
              <form action="{{route('products.destroy',['product' => $product->id ])}}" method="POST">
                <a class="btn btn-primary " href="{{route('products.edit',['product' => $product->id])}}"><i class="fa fa-edit"></i> </a>
                <a class="btn btn-primary " href="{{route('products.show',['product' => $product->id])}}"><i class="fa fa-eye"></i> </a>

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
