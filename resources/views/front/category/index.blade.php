@extends('front.layouts.main')

@section('content')

<div class="breadcrums">
  <div class="container">
    <div class="breadcrums__wrapper">
      <h1>{{$data['category']->title}}</h1>
      <div class="breadcrums__items">
        <a href="{{route('front.home.index')}}">Главная</a>
        <a href="{{route('front.category.index', $data['category']->slug)}}">/  {{$data['category']->title}}</a>
      </div>
    </div>
  </div>
</div>


<div class="products">
  <div class="container">
    <div class="products__wrapper">
      <form action="{{route('front.category.index', $data['category']->slug)}}" method="GET" class="products__filter">
        <h4>Фильтры товаров</h4>
        
        @foreach ($data['category']->filters as $filter)
            <label for="check{{$filter->id}}" class="products__filter-item">
              <input type="checkbox"
              @if(isset($data['filters_id']))
                @foreach ($data['filters_id'] as $fi)
                    @if ($fi == $filter->id)
                        checked
                    @endif
                @endforeach
              @endif
              id="check{{$filter->id}}" value="{{$filter->id}}">
              {{$filter->title}}
            </label>
        @endforeach
        <input type="hidden" name="filters_id" id="filters_id">
        <button type="submit">Применить</button>
      </form>
      <div class="products__items">
        @foreach ($data['products'] as $product)
            @include('front.layouts.product', ['product'=>$product])
        @endforeach
      </div>
    </div>
  </div>
</div>
  
@endsection
