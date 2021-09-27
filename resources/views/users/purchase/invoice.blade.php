@extends('users.invoice_layout')
@section('user_content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Product Invoice Details</h6>
  </div>
  <div class="card-body">
    <div class="row clearfix justify-content-md-center">
      <div class="col-md-6">
        <div> <strong> Suplier:</strong> {{$user ->name}}</div>
        <div><strong> Email: </strong>{{$user ->email}}</div>
        <div><strong>Phone:</strong> {{$user ->phone}}</div>
      </div>
      <div class="col-md-6 text-center">
        <div><strong>Date:</strong> {{$invoice ->date}}</div>
        <div><strong>Challen No:</strong> {{$invoice ->challan_no}}</div>

      </div>
    </div>

    <div class="invoice_item">
      <table class="table table-borderless table-hover mt-5">
        <thead>
          <th>SL</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th class="text-right">Total</th>
          <th class="text-right">Action</th>
        </thead>
        <tbody>


          @foreach($invoice->items as $key => $item)

          <tr>
            <td>{{$key+1}}</td>
            {{-- {{dd($item ->product->title)}} --}}
            <td>{{$item ->product['title']}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td class="text-right">{{$item->total}}</td>

            <td>
              <form class="text-right" action="{{route('user.purchase.delete_item',['id' => $user->id ,'invoice_id' => $invoice->id , 'item_id' => $item->id ])}}" method="POST">

                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tr>
          <td colspan="2"><Button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct"><i class="fa fa-plus"></i> Add Product</Button></td>
          <td colspan="2" class="text-right"><strong>Total :</strong> </td>
          <td class="text-right">{{$totalPayable}}</td>
        </tr>
        <tr>
          <td colspan="2"><Button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newPaymentForInvoice"><i class="fa fa-plus"></i> Add Payment</Button></td>
          <td colspan="2" class="text-right"><strong>Paid :</strong> </td>
          <td class="text-right">{{$totalPaid }}</td>
        </tr>
        <tr>

          <td colspan="4" class="text-right"><strong>Due :</strong> </td>
          <th class="text-right">{{$totalPayable - $totalPaid }}</th>
          <th></th>
        </tr>
      </table>
    </div>

  </div>
</div>

</div>
{{-- Add New product Model  --}}


<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    {!! Form::open(['route' => ['user.purchase.add_item', ['id'=> $user->id , 'invoice_id' => $invoice->id]],'method'=> 'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newProductModalLabel">Add New product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row">
          <label for="product" class="col-sm-3 col-form-label">Product</label>
          <div class="col-sm-9">
            {!! Form::select('product_id', $products, Null,['class' => 'form-control','id' => 'product','required','placeholder' => 'Select Product']); !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="price" class="col-sm-3 col-form-label">Unit Price</label>
          <div class="col-sm-9">

            {!! Form::text('price', Null, ['class' => 'form-control','id'=>'price','required','placeholder' => 'Price']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
          <div class="col-sm-9">

            {!! Form::text('quantity', Null, ['class' => 'form-control','id'=>'quantity','required','placeholder' => 'quantity']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="total" class="col-sm-3 col-form-label">Total</label>
          <div class="col-sm-9">

            {!! Form::text('total', Null, ['class' => 'form-control','id'=>'total','required','placeholder' => 'total']) !!}
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary mt-1 btn-md">Submit</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>



</div>

</div>

</div>

<!-- Modal -->

{{-- New Reciept For invoice  --}}

<div class="modal fade" id="newPaymentForInvoice" tabindex="-1" role="dialog" aria-labelledby="newPaymentForInvoiceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['route' => ['user.payments.store', [$user->id , $invoice ->id]],'method'=> 'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPaymentForInvoiceModalLabel">New payments for this invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="date" class="col-sm-3 col-form-label">Date</label>
          <div class="col-sm-9">

            {!! Form::date('date', Null, ['class' => 'form-control','id'=>'date','placeholder' => 'date', 'required']) !!}
          </div>
        </div>

        <div class="form-group row">
          <label for="amount" class="col-sm-3 col-form-label">amount</label>
          <div class="col-sm-9">

            {!! Form::text('amount', Null, ['class' => 'form-control','id'=>'amount','placeholder' => 'amount', 'required']) !!}
          </div>
        </div>

        <div class="form-group row">
          <label for="note" class="col-sm-3 col-form-label">Note</label>
          <div class="col-sm-9">

            {!! Form::textarea('note', Null, ['class' => 'form-control','id'=>'note', 'rows' => '3','placeholder' => 'note']) !!}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary mt-1 btn-md">Submit</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>



</div>

</div>

</div>
@stop
