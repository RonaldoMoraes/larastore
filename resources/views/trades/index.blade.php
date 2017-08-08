@extends ('layouts.app')

@section ('content')

<div class="">
  <a href="{{route('new_trade')}}" class="btn btn-primary">New Trade</a>
</div>
<h1>Listing all trades</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>User</th>
      <th>Product</th>
      <th>Amount</th>
      <th>Total</th>
    </tr>
  </thead>

  <tbody>
    @foreach($trades as $trade)
      <tr><!-- {{route('trade', $trade->id)}} -->
        <td>{{$trade->id}}</td>
        <td>{{$trade->user->name}}</a></td>
        <td>{{$trade->product->name}}</td>
        <td>{{$trade->amount}}</td>
        <td>{{$trade->total}}</td>
      </tr>
    @endforeach
  </tbody>
</table>


@endsection