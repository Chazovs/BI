<!DOCTYPE html>
<!-- saved from url=(0049)https://bootstrap-4.ru/docs/4.3.1/examples/cover/ -->
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Одностраничный шаблон для создания простых и красивых домашних страниц.">

    <title>Обложка | Cover Template for Bootstrap</title>

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
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">

  </head>

  <body class="text-center">

<script type="text/javascript" async="" src="{{ asset('js/watch.js') }}"></script><script async="" src="{{ asset('js/analytics.js') }}"></script><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4481610-59', 'auto');
  ga('send', 'pageview');

</script>

<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39705265 = new Ya.Metrika({ id:39705265, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39705265" style="position:absolute; left:-9999px;" alt="Yandex.Metrika" /></div></noscript> <!-- /Yandex.Metrika counter -->

   <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">

      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="<?php echo route('register'); ?>">Регистрация</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">Bi</h1>
    <p class="lead">BI (buisness intersections) - это инструмент для системного анализа точек контакта между бизнесом и людьми </p>
    <p class="lead">
      <a href="<?php echo route('home'); ?>" class="btn btn-lg btn-secondary">Авторизация</a>
    </p>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Все права защищены Сергей и Александр Чазовы 2019.</p>
    </div>
  </footer>
</div>

</body></html>
