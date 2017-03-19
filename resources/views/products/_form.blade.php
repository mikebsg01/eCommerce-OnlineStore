{!! Form::open(['url' => $url, 'method' => $method]) !!}
  <div class="form-group">
    {!! Form::text('title', $product->title, ['class' => 'form-control', 'placeholder' => 'Some title...']) !!}
  </div>
  <div class="form-group">
    {!! Form::number('pricing', $product->pricing, ['class' => 'form-control text-right', 'placeholder' => 'Price (USD)']) !!}
  </div>
  <div class="form-group">
    {!! Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Describe your product...']) !!}
  </div>
  <div class="form-group text-right">
    <button class="btn btn-success yellow primary-text">{!! $submit !!}</button>
  </div>
{!! Form::close() !!}