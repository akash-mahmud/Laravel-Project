@extends('users.user_layout')

@section('user_card')

<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-1 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Sales</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php 
                  $totalSale = 0;
                  foreach ($user->purchases as $purchase) {
                    $totalSale += $purchase->items()->sum('total');
                  }
                  echo $totalSale;
                ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-1 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Purchase</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php 
                  $totalPurchase = 0;
                  foreach ($user->sales as $sale) {
                    $totalPurchase += $sale->items()->sum('total');
                  }
                  echo $totalPurchase;
                ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-1 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Receipts</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalReceipts = $user->receipts->sum('amount')}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-1 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Payments</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPayment = $user->payments->sum('amount')}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-1 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
            <?php 
     $totalBalance  = ($totalPurchase+$totalReceipts)-($totalSale+$totalPayment)
  ?>
            Balance</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            @if($totalBalance>= 0)
            {{$totalBalance}}
            @else
            0
            @endif
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-1 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
            Due</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            @if($totalBalance <= 0) {{$totalBalance}} @else 0 @endif </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  @stop

  @section('user_content')


  <div class="c2rd shado3 mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">{{$user ->name}}</h6>
    </div>
    <div class="card-body">



      <table class="table">

        <tr>
          <th>Group</th>
          <td>{{$user ->group ->title}}</td>
        </tr>

        <tr>
          <th>Name</th>
          <td>{{$user ->name}}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{$user ->email}}</td>
        </tr>
        <tr>
          <th>Phone</th>
          <td>{{$user ->phone}}</td>
        </tr>
        <tr>
          <th>Address</th>
          <td>{{$user ->address}}</td>
        </tr>
      </table>

    </div>

  </div>

</div>
@stop
