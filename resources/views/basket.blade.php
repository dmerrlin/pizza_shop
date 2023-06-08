@extends('layout')

@section('title')Корзина@endsection

@section('main_content')
    <div class="m-5">
        <div class="container-fluid center">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Количество</th>
                        </tr>
                        </thead>
                        <tbody id = 'basket_info'>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
