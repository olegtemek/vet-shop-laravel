<header class="header">
  <div class="container">
    <div class="header__wrapper">
      <div class="header__left">
        <h1>Your company</h1>
      </div>
      <div class="header__right">
        <ul class="header__nav">
          <li>
            <a href="{{route('front.home.index')}}">Главная</a>
          </li>
          @foreach ($global_data['categories'] as $category)
              @if ($category->child->count() >= 1)
                  <li class="menu">
                    <button>{{$category->title}}</button>
                    <ul>
                      @foreach ($category->child as $cp)
                        <li>
                          <a href="#">{{$cp->title}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
              @else
                  @if (empty($category->parent))
                    <li>
                      <a href="#">{{$category->title}}</a>
                    </li>
                  @endif
              @endif
          @endforeach

          <li>
            <a href="#">О нас</a>
          </li>
        </ul>

        @if (auth()->user())
            <a href="#">Профиль</a>
        @else
          <a href="#">Войти / Регистрация</a>
        @endif
        <a href="#">Корзина <i class="fa fa-shopping-cart"></i></a>
      </div>

      <div class="header__menu">
        <i class="fa fa-bars"></i>
        <span>&#9587;</span>
        <ul>
          <li>
            <a href="{{route('front.home.index')}}">Главная</a>
          </li>
          @foreach ($global_data['categories'] as $category)
              @if ($category->child->count() >= 1)
                  <li class="menu">
                    <button>{{$category->title}}</button>
                    <ul>
                      @foreach ($category->child as $cp)
                        <li>
                          <a href="#">{{$cp->title}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
              @else
                  @if (empty($category->parent))
                    <li>
                      <a href="#">{{$category->title}}</a>
                    </li>
                  @endif
              @endif
          @endforeach

          <li>
            @if (auth()->user())
              <a href="#">Профиль</a>
            @else
              <a href="#">Войти / Регистрация</a>
            @endif
          </li>
          <li>
            <a href="#">Корзина <i class="fa fa-shopping-cart"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>