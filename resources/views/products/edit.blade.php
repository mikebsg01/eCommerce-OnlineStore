@extends('layouts.app')
@section('title', 'Edit product')
@section('content')
<div class="container text-center">
  <div class="card product text-left">
    <div class="header col-xs-12">
      <h1>Edit product</h1>
    </div>
    @include('products._form', ['product' => $product, 'url' => '/products/'.$product->id, 'method' => 'PUT', 'submit' => 'Update'])
  </div>
</div>
@endsection