


<!DOCTYPE html>
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Пользовательская форма и дизайн для простой формы входа.">

    <title> Авторизация | Buisness Intersections</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

</head>

<body class="text-center">

{{--<script type="text/javascript" async="" src="./Страница входа _ Signin Template for Bootstrap_files/watch.js.Без названия"></script><script async="" src="./Страница входа _ Signin Template for Bootstrap_files/analytics.js.Без названия"></script><script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-4481610-59', 'auto');
    ga('send', 'pageview');
</script>

<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39705265 = new Ya.Metrika({ id:39705265, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39705265" style="position:absolute; left:-9999px;" alt="Yandex.Metrika" /></div></noscript> <!-- /Yandex.Metrika counter -->--}}
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
<header class="masthead mb-auto">
    <div class="inner">

        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="<?php echo route('register'); ?>">Регистрация</a>
        </nav>
    </div>
</header>


<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <img class="mb-4" src="{{ asset('img/main/bi-small.png') }}" alt="" width="64" height="64">
    <h1 class="h3 mb-3 font-weight-normal">Business Intersections</h1>
    <p>Инструмент для анализа точек контакта в вашем бизнесе</p>

    <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
    <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    <label for="password" class="sr-only">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Пароль" name="password" required>

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
    @endif

    <div class="checkbox mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Запомнить меня') }}
        </label>
    </div>
    <button type="submit" class="btn btn-primary">
        {{ __('Войти') }}
    </button>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Забыли пароль?') }}
        </a>
    @endif
    <p class="mt-5 mb-3 text-muted">Все права защищены Сергей и Александр Чазовы 2019</p>
</form>
</div>
</body></html>
