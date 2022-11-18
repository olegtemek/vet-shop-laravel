@extends('front.layouts.main')

@section('content')
  @include('front.layouts.banners')

  <section class="new">
    <div class="container">
      
      <div class="new__wrapper">
        <h2>Новинки</h2>
        <div class="new__items">
          @foreach ($data['products'] as $product)
              @include('front.layouts.product', ['product' => $product])
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection