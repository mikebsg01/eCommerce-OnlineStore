{!! Form::open(['url' => '/in_shopping_carts', 'method' => 'POST', 'class' => 'inline-block']) !!}
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="submit" class="btn btn-success yellow primary-text">Agregar al carrito</button>
{!! Form::close() !!}