@extends('layout')

@section('title')Оформить заказ@endsection

@section('main_content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12">

                        <div class="mx-3 mb-3 cart-title cart-title">
                            <h2>Введите ваши данные</h2>
                        </div>

                        <form action="#" method="post">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="ФИО" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email" value="">
                                </div>

                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="street_address" placeholder="Адрес"
                                           value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="phone_number" min="0" placeholder="Номер телефона"
                                           value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10"
                                              placeholder="Комментарий к заказу"></textarea>
                                </div>

                                <div class="col-12">
                                    <div  class="text-center">
                                        <a>Итого:$140.00</a>

                                        <div class="cart-btn mt-100">
                                            <a href="checkout.html" class="button">Оплата</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

@endsection
