@extends('admin.main')


@section('title')
Создать категорию
@endsection

@section('content')


<div class="card-body">
  <form method="POST" action="{{ route('admin.category.store') }}">
    @csrf
    <div class="cart-body">
      <div class="row">
        <div class="col-sm-12 row mb-4">
          <h2 class="col-sm-12">Создать новую категорию</h2>
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
              <label>Родительская категория</label>
              @error('parent_id')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <select name="parent_id" class="form-control" id="">
                <option value="0">Никакая</option>
                @foreach ($categories as $category)
                    
                    @if (empty($category->parent))
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @else
                    {{-- <option value="{{$category->id}}">{{$category->parent->title}} || {{$category->title}}</option>     --}}
                    @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Описание</label>
              @error('description')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea class="form-control" name="description" placeholder="Описание">{{ old('description') }}</textarea>
            </div>
          </div>


          <div class="row col-sm-12 mt-4">
            <h2 class="col-sm-12">Seo(Необзятельно)</h2>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Seo title</label>
                @error('seo_title')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
                <input type="text" value="{{ old('seo_title') }}" class="form-control" name="seo_title" placeholder="Seo title">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Seo description</label>
                @error('seo_description')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
                <input type="text" value="{{ old('seo_description') }}" class="form-control" name="seo_description" placeholder="Seo description">
              </div>
            </div>
          </div>


      </div>
    </div>


    <div class="row col-sm-12 mt-2">      
      <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Добавить категорию</button>
      </div>    
    </div>
  </form>
</div>

@endsection

@section('js')
    
@endsection