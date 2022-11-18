<div class="product__item">
  <img src="/{{$product->image}}" alt="{{$product->title}}">
  <h3>{{$product->title}}</h3>
  <span>Цена: {{intval($product->price) == 0 ? 'Цену уточняйте' : number_format(intval($product->price), 0, ' ', ' ') . 'Тг'}}</span>

  <button>Добавить в корзину</button>
</div>