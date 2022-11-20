<div class="product__item">
  <img src="/{{$product->image}}" alt="{{$product->title}}">
  <h3>{{$product->title}}</h3>
  <span>Цена: {{intval($product->price) == 0 ? 'Цену уточняйте' : number_format(intval($product->price), 0, ' ', ' ') . 'Тг'}}</span>
  <input type="hidden" value="{{$product->id}}">
  <button class="add-to-cart">Добавить в корзину</button>
</div>