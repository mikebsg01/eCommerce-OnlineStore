@extends('layouts.app')
@section('title', 'Product')
@section('content')
<div class="container text-center">
  <div class="card product text-left">
    <div class="header col-xs-12">
      <div class="col-xs-9">
        <h1>{{ $product->title }}</h1>
      </div>
      <div class="col-xs-3 text-right">
        @if (Auth::check() && $product->user_id == Auth::user()->id)
          <div class="actions">
            <a href="{!! url('/products/'.$product->id.'/edit') !!}" class="btn btn-link no-padding no-margin purple-text">
              <i class="material-icons">mode_edit</i>
            </a>
            @include('products.delete', ['product' => $product])
          </div>
        @endif
      </div>
    </div>
    <div class="col-sm-6 col-xs-12"></div>
    <div class="col-sm-6 col-xs-12">
      <p>
        <strong>Description</strong>
      </p>
      <p>
        {{ $product->description }}
      </p>
      <span>
        @include('in_shopping_carts._form', ['product' => $product])
      </span>
    </div>
  </div>
</div>
@endsection