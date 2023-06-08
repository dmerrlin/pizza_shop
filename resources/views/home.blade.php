@extends('layout')

@section('title')Меню@endsection

@section('main_content')
        <div class="btn-group ">
            <div class="container">
                <div class="col-lg-12">
                    <div class="sort_class">
                        <button id="sort-asc">Цена возрастание</button>
                        <button id="sort-desc">Цена убывание</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row data-price">
                @foreach($menu as $pizza)
                    <div class="col-4 row">
                        <div class="thumb col-4">
                            <img style="max-width: 100px" src="/img/pizza/{{$pizza->filename}}">
                        </div>
                        <div class="info col-8">
                            <h3>{{$pizza->name}}</h3>
                            <p>{{$pizza->info}}</p>
                            <span>{{$pizza->price}}</span>
                            <button class="buy" data_id_buy = "{{$pizza->id}}" >В корзину</button>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

@endsection
