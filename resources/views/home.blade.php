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


            </div>
        </div>

@endsection
