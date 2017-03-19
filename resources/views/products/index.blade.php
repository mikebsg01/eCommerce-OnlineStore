@extends('layouts.app')
@section('title', 'All products')
@section('content')
<div class="big-padding text-center purple white-text">
  <h1>Products</h1>
</div>
<div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
        <tr>
          <td>
            {{ $product->id }}
          </td>
          <td>
            <a href="{{ url('/products/'.$product->id) }}">
              {{ $product->title }}
            </a>
          </td>
          <td>{{ $product->description }}</td>
          <td>$ {{ $product->pricing }}</td>
          <td>
            <a href="{!! url('/products/'.$product->id.'/edit') !!}" class="btn btn-link no-padding no-margin purple-text">
              <i class="material-icons">mode_edit</i>
            </a>
            @include('products.delete', ['product' => $product])
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5">
            <p class="text-center">No products registered yet.</p>
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="floating">
  <a href="{!! url('/products/create') !!}" class="btn btn-primary btn-fab yellow primary-text">
    <i class="material-icons">add</i>
  </a>
</div>
@endsection