@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Dashboard</h1>
    </div>
    <div class="panel-body">
      <h3>Statistics</h3>
      <div class="row">
        <div class="col-xs-4 col-md-3 sale-data">
          <span>$ {{ $totalMonth }} USD</span>
          Income of the month
        </div>
        <div class="col-xs-4 col-md-3 sale-data">
          <span>{{ $totalMonthCount }}</span>
          Number of sales
        </div>
      </div>
      <h3>Sales</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID. Sale</th>
            <th>Buyer</th>
            <th>Address</th>
            <th>No. Guide</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->recipient_name }}</td>
              <td>{{ $order->address }}</td>
              <td>
                <a href="#" data-type="text" data-pk="{{ $order->id }}" data-url="{{ url('/orders/'.$order->id) }}" data-title="No. Guide" data-value="{{ $order->guide_number }}" class="set-guide-number" data-name="guide_number"></a>
              </td>
              <td>$ {{ $order->total }} USD</td>
              <td>
                <a href="#" data-type="select" data-pk="{{ $order->id }}" data-url="{{ url('/orders/'.$order->id) }}" data-title="Status" data-value="{{ $order->status }}" class="set-status" data-name="status"></a>
              </td>
              <td>{{ $order->created_at }}</td>
              <td> --- </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection