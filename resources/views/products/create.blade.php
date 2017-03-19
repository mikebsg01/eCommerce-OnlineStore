@extends('layouts.app')
@section('title', 'Create product')
@section('content')
<div class="container text-center">
  <div class="card product text-left">
    <div class="header col-xs-12">
      <h1>New product</h1>
    </div>
    @include('products._form', ['product' => $product, 'url' => '/products', 'method' => 'POST', 'submit' => 'Publish'])
  </div>
</div>
@endsection