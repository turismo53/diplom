<img id="loader" src="https://i.pinimg.com/originals/4b/bf/00/4bbf00121a9c3f6f7857e752cbf6488e.gif" alt="sex" >
@extends('layouts/master')

@section('title','Главная')

@section('content')


                            <h1>Все товары</h1>
    <div class="row">

    @foreach($products as $product)

    @include('card', compact('product'))

    @endforeach

        <p class="col-lg-5 col-sm-5 col-md-5 col-4">{{$products->links()}}</p>
        <script src="/js/onload.js"></script>
    </div>


@endsection

