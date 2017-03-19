{!! Form::open(['url' => '/products/'.$product->id, 'method' => 'DELETE', 'class' => 'inline-block']) !!}
  <button type="submit" class="btn btn-link no-padding no-margin purple-text">
    <i class="material-icons">delete</i>
  </button>
{!! Form::close() !!}