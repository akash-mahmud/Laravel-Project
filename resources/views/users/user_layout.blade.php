@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">

  <div class="col-md-4">
    <h2>{{$user ->name}}'s details</h2>
    <a href="{{url('users/create')}}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
  </div>
  <div class="col-md-8 text-right mb-3">



    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayments">
      <i class="fa fa-plus"></i> New Payments</button>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
      <i class="fa fa-plus"></i> New Receipt</button>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale">
      <i class="fa fa-plus"></i> New Sale</button>
  </div>
</div>

@include('users.user_layout_content')





<!-- Modal -->
<div class="modal fade" id="newPayments" tabindex="-1" role="dialog" aria-labelledby="newPaymentsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['route' => ['user.payments.store', $user->id],'method'=> 'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPaymentsModalLabel">New Payment</h5>
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


{{-- Model For Receipt --}}

<!-- Modal -->
<div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['route' => ['user.receipt.store', $user->id],'method'=> 'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newReceiptModalLabel">New Receipt</h5>
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
{{-- Sale Invoice --}}

<!-- Modal -->
<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['route' => ['user.sales.store', $user->id],'method'=> 'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSaleModalLabel">New Sale Invoice</h5>
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
          <label for="challan_no" class="col-sm-3 col-form-label">Challan No.</label>
          <div class="col-sm-9">

            {!! Form::text('challan_no', Null, ['class' => 'form-control','id'=>'challan_no','placeholder' => 'challan no']) !!}
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
