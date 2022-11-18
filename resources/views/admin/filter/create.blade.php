@extends('admin.main')


@section('title')
Создать фильтр
@endsection

@section('content')


<div class="card-body">
  <form method="POST" action="{{ route('admin.filter.store') }}">
    @csrf
    <div class="cart-body">
      <div class="row">
        <div class="col-sm-12 row mb-4">
          <h2 class="col-sm-12">Создать новый фильтр</h2>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Заголовок</label>
              @error('title')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <input type="text" value="{{ old('title') }}" class="form-control" name="title" placeholder="Заголовок">
            </div>
          </div>

          

          <div class="col-sm-4">
            <div class="form-group">
              <label>Категория</label>
              @error('category_id')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <select name="category_id" class="form-control" id="">
                @foreach ($categories as $category)
                    @if ($category->child->count() < 1)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endif
                @endforeach
              </select>
            </div>
          </div>

      </div>
    </div>


    <div class="row col-sm-12 mt-2">      
      <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Добавить фильтр</button>
      </div>    
    </div>
  </form>
</div>

@endsection

@section('js')
    
@endsection