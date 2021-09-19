<div class="row clearfix mt-5">
  <div class="col-md-2">
    <div class="nav flex-column nav-pills">
      <a class="nav-link @if($tab_menu === 'user_info') active  @endif()" href="{{route('users.show', $user->id)}}">User Info</a>
      <a class="nav-link @if($tab_menu === 'sales') active  @endif()" href="{{route('user.sales' , $user ->id)}}">Sales</a>
      <a class="nav-link @if($tab_menu === 'purchase') active  @endif()" href="{{route('user.purchase' , $user ->id)}}">Purchases</a>
      <a class="nav-link @if($tab_menu === 'payments') active  @endif()" href="{{route('user.payments' , $user ->id)}}">Payments</a>
      <a class="nav-link @if($tab_menu === 'receipt') active  @endif()" href="{{route('user.receipt' , $user ->id)}}">Reciepts</a>
    </div>
  </div>
  <div class="col-md-10">

    @yield('user_content')
  </div>
</div>
