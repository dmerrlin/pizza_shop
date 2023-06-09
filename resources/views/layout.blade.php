<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>
<body>
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid p-0">
                <div class="row align-items-center no-gutters">
                    <div class="col-xl-5 col-lg-5">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/">Меню</a></li>
                                    <li><a href="/basket">Корзина</a></li>
                                    <li><a href="/order">Оформить заказ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo-img">
                            <a href="/">
                                <img src="img/logo.jpg" alt="">
                            </a>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="bradcam_area breadcam_bg overlay">
    <h3>@yield('title')</h3>
</div>

@yield('main_content')

<footer class="footer">
    <div class=" col-xl-12 col-md-12 col-lg-12">
        <div class=" text-center ">
            <h3 class="footer_title pos_margin"> Киров</h3>
            <p>"Адрес" <br>
                <a href="#">info@pizza.com</a></p>
            <a class="number" href="#">"Номер телефона"</a>

        </div>
    </div>
</footer>



</body>
</html>
