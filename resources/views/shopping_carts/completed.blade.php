@extends('layouts.app')
@section('title', 'Purchase completed')
@section('content')
<div class="big-padding text-center yellow primary-text">
  <h1>Purchase completed</h1>
</div>
<div class="container">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="card large-padding">
      <h3>Your payment has been processed <span class="{{ $order->status }} pull-right">{{ $order->status }}</span></h3>
      <p>Corroborate your shipping information: </p>
      <div class="row large-padding">
        <div class="col-xs-4">
          E-mail:
        </div>
        <div class="col-xs-8">
          {{ $order->email }}
        </div>
      </div>
      <div class="row large-padding">
        <div class="col-xs-4">
          Address:
        </div>
        <div class="col-xs-8">
          {{ $order->address }}
        </div>
      </div>
      <div class="row large-padding">
        <div class="col-xs-4">
          Postal Code:
        </div>
        <div class="col-xs-8">
          {{ $order->postal_code }}
        </div>
      </div>
      <div class="row large-padding">
        <div class="col-xs-4">
          State and Country:
        </div>
        <div class="col-xs-8">
          {{ $order->state }},
          {{ $order->country_code }}
        </div>
      </div>
      <div class="top-space text-center">
        <a href="{{ url('/purchases/'.$shopping_cart->customid) }}">Permalink de tu compra</a>
      </div>
    </div>
  </div>
</div>
@endsection