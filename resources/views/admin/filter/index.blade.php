@extends('admin.main')


@section('title')
Все фильтры
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 mb-4">
        <a href="{{route('admin.filter.create')}}" class="btn btn-success">Создать новый фильтр</a>
      </div>
      <div class="card col-sm-12" style="min-height:100%;">
        <div class="card-header">
        <h3 class="card-title">Все фильтры</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 250px;">
            <input type="text" name="table_search" id="search_table" class="form-control float-right" placeholder="Поиск">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#id</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Удалить/Изменить</th>
              </tr>
            </thead>
          <tbody>
            @foreach ($filters as $filter)
            <tr class="search">
              <td>{{$filter->id}}</td>
              <td class="title">{{$filter->title}}</td>
              <td>{{$filter->parent->title ?? '-'}}</td>
              <td>
                <a href="{{route('admin.filter.edit', $filter->id)}}" class="btn btn-primary">Изменить</a>
                <form style="display:inline" action="{{route('admin.filter.destroy', $filter->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
        
        </div>
    </div>
  </div>
</section>

@endsection



@section('js')
    <script>
      let table_search = document.getElementById('search_table');

      table_search.addEventListener('input', (e)=>{
        let all = document.querySelectorAll('.search')
        all.forEach(item => {
          item.style.display = 'none';
          
          let title =item.querySelector('.title').innerText.toLowerCase();
          
          if(title.toLowerCase().indexOf(e.target.value.toLowerCase()) > -1){
            item.style.display = 'table-row';
            console.log('test');
          }
          
          
        });
      })
    </script>
@endsection