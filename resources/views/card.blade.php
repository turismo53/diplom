<div class="col-sm-6 col-md-12">
    <div class="thumbnail">
        <div class="labels">


                    </div>
        <img src="{{ Storage::url($product->image) }}" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}}р.</p>
            <p>
            <form action="{{ route('basket-add',$product->id) }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
            <a href="{{route('product',[$product->category->code, $product->code] )}}" class="btn btn-info"
                   role="button">Подробнее</a>
            @csrf
             </form>
            </p>
        </div>
    </div>
    <br>
</div>

