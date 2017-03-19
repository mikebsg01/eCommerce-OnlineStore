@extends('layouts.app')
@section('content')
<div class="big-padding text-center yellow primary-text">
  <h1>Your Shopping Cart!</h1>
</div>
<div class="container">
  <div class="col-md-10 col-md-offset-1 col-xs-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td class="text-center">ID</td>
          <td>Product</td>
          <td class="text-right">Price</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td class="text-center">
              {{ $product->id }}
            </td>
            <td>
              <a href="{{ url('/products/'.$product->id) }}">
                {{ $product->title }}
              </a>
            </td>
            <td class="text-right">
              $ {{ $product->pricing }}
            </td>
          </tr>
        @endforeach
        @if ($products->count() > 0)
          <tfoot>
            <tr>
              <td>&nbsp;</td>
              <th class="text-right">Total:</th>
              <th class="text-right">
                $ {{ $total }}
              </th>
            </tr>
          </tfoot>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection