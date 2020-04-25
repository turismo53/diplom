<div class="slider-item p-2 m-0">
    <div class="thumbnail">

        <a href="{{route('product',[$product->category->code, $product->code] )}}"
           role="button"><img src="{{ Storage::url($product->image) }}" alt="iPhone X 64GB"></a>
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}}р.</p>
            <p>
            <form action="{{ route('basket-add',$product->id) }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>

            @csrf
             </form>
            </p>
        </div>
    </div>
    <br>
</div>

