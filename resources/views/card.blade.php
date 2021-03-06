<div class="slider-item p-2 m-0">
    <div class="thumbnail">
        <a href="{{route('product',[$product->category->code, $product->code] )}}"
           role="button"><img src="{{ Storage::url($product->image) }}" alt="product"></a>
        <div class="caption">
            <h1>{{$product->name}}</h1>
            <p>{{round($product->price(),2) }}{{$product->symbol()}} </p>
            <form action="{{ route('basket-add',$product->id) }}" method="POST">
                <button type="submit" class="btn btn-primary submit"  onclick="hide()">
                    @lang('basket.basket_add')
                </button>
                <label  class="submit-label" style="display: none; color: black;"> Обработка...</label>
                <script>
                    function hide() {
                        $(".submit").css("display","none");
                        $(".submit-label").css("display","block");
                    }
                </script>

            @csrf
             </form>

        </div>
    </div>
    <br>
</div>

