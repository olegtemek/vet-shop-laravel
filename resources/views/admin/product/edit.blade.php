@extends('admin.main')


@section('title')
Изменить продукт {{$product->title}}
@endsection

@section('content')


<div class="card-body">
  <form method="POST" action="{{ route('admin.product.update', $product->id) }}">
    @csrf
    @method('PUT')
    <div class="cart-body">
      <div class="row">
        <div class="col-sm-12 row mb-4">
          <h2 class="col-sm-12">Изменить продукт</h2>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Заголовок</label>
              @error('title')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <input type="text" value="{{ $product->title }}" class="form-control" name="title" placeholder="Заголовок">
            </div>
          </div>

          

          <div class="col-sm-4">
            <div class="form-group">
              <label>Категория</label>
              @error('category_id')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                @if($category->child->count() < 1)
                    @if (empty($category->parent))


                      @if($category->id == $product->category_id)
                      <option selected value="{{$category->id}}">{{$category->title}}</option>
                      @else
                      <option value="{{$category->id}}">{{$category->title}}</option>
                      @endif
                    @else
                      @if($category->id == $product->category_id)
                      <option selected value="{{$category->id}}">{{$category->parent->title}} || {{$category->title}}</option>
                      @else
                      <option value="{{$category->id}}">{{$category->parent->title}} || {{$category->title}}</option>
                      @endif
                      
                    @endif
                @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Выбор фильтра</label>
              @error('filters')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <select class="form-control" id="filter_select" multiple data-live-search="true">
                @foreach ($filters as $filter)
                    <option
                    @foreach ($filters_product as $fp)
                      @if($fp->filter_id == $filter->id)
                        selected
                        @endif
                    @endforeach
                    class="options" value="{{$filter->id}}">{{$filter->parent->title}} || {{$filter->title}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <div class="col-sm-12">
            <div class="form-group">
              <label>Описание</label>
              @error('description')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea class="form-control" placeholder="Описание" name="description">{{$product->description }}</textarea>
            </div>
          </div>

          <div class="col-sm-12 row mb-4">
            <div class="col-sm-6">
              <div class="form-group">
                @error('image')
                  <span class="error text-danger">{{ $message }}</span>
                @enderror
                <div class="row col-sm-4 input-group">
                  <label style="display: block; width:100%">Изображение</label>
                  <input type="text" class="form-control" id="image" name="image" value="{{ $product->image }}">
                  <div class="input-group-prepend">
                    <a href="" class="popup_selector btn btn-success" data-inputid="image"><i class="fas fa-file"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-sm-4">
            <div class="form-group">
              <label>Цена</label>
              @error('price')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$product->price}}">
            </div>
          </div>


          <input type="hidden" name="filters" id="filters">

          <div class="row col-sm-12 mt-4">
            <h2 class="col-sm-12">Seo(Необзятельно)</h2>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Seo title</label>
                @error('seo_title')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
                <input type="text" value="{{ $product->seo_title }}" class="form-control" name="seo_title" placeholder="Seo title">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Seo description</label>
                @error('seo_description')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
                <input type="text" value="{{ $product->seo_description }}" class="form-control" name="seo_description" placeholder="Seo description">
              </div>
            </div>
          </div>


      </div>
    </div>


    <div class="row col-sm-12 mt-2">      
      <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Сохранить продукт</button>
      </div>    
    </div>
  </form>
</div>

@endsection

@section('js')
    <script>
      $('#filter_select').selectpicker();
      $('#filter_select').change(function () {
        $('#filters').val($('#filter_select').val())
      });
    </script>

    @yield('more_js')
@endsection