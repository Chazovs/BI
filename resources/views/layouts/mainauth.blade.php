<!DOCTYPE html>
<!-- saved from url=(0053)https://bootstrap-4.ru/docs/4.3.1/examples/dashboard/ -->
<html lang="ru">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Buisness intersections - инструмент для системного анализа точек контакта между бизнесом и людьми">
<!-- csfr Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Buisness intersections | личный кабинет</title>
  <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"
type="text/javascript" charset="utf-8" ></script>
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
     <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
     <style type="text/css">/* Chart.js */
      @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
  </head>
  <body>

    <script type="text/javascript" async="" src="{{ asset('js/watch.js') }}"></script>
    <script async="" src="{{ asset('js/analytics.js') }}"></script>
    <script async="" src="{{ asset('js/main.js') }}"></script>

    <!-- гугл аналитика -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-4481610-59', 'auto');
      ga('send', 'pageview');
    </script>
    <!-- Yandex.Metrika counter -->
     <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39705265 = new Ya.Metrika({ id:39705265, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39705265" style="position:absolute; left:-9999px;" alt="Yandex.Metrika" /></div></noscript> 
     <!-- /Yandex.Metrika counter -->

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
       <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/companies/my') }}">BI.ru.net</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
  
        @guest
                            <li class="nav-item text-nowrap">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item text-nowrap">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown text-nowrap">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
  
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
           <a class="nav-link active" href="{{ route('profile',['id'=>Auth::user()->id]) }}">
             <img src='{{ Auth::user()->avatar }}' class="rounded-circle" width="40" height="40">
{{ Auth::user()->real_name }} {{ Auth::user()->real_lastname }}
             
           </a>
          </li>
         </ul>
         <ul class="nav flex-column">
          <li class="nav-item ml-4">
            <a class="nav-link" href="{{ route('allTasks',['id'=>Auth::user()->id]) }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              Мои задачи
            </a>
          </li>
          <li class="nav-item ml-4">
            <a class="nav-link" href="{{ url('/companies/my') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          Мои компании
            </a>
          </li>
          <li class="nav-item ml-4">
            <a class="nav-link" href="{{ url('/companies/all') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
          Все компании
            </a>
          </li>
           </li>
          <li class="nav-item ml-4">
            <a class="nav-link" href="{{ url('/about/') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
          О проекте
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Администрирование</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item ml-4">
            <a class="nav-link" href="{{ route('editProfile',['id'=>Auth::user()->id]) }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
             Ред профиль
            </a>
          </li>
         <li class="nav-item text-center">
            <a class="btn btn-outline-dark btn-sm mt-4 w-75" href="#" data-toggle="modal" data-target="#mainModal" onclick = "newIdea()">
          Идея разработчикам
            </a>
          </li>
           <li class="nav-item text-center">
            <a class="btn btn-outline-dark btn-sm w-75" href="https://bootstrap-4.ru/docs/4.3.1/examples/dashboard/#">
          Поддержать проект
            </a>
          </li>
        </ul>
      </div>
    </nav>
<!-- главный контент -->
@yield('main')

  </div>
 </div>
  
    <script
  src="{{ asset('js/jquery-3.4.0.js') }}"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{ asset("js/jquery-slim.min.js") }}"><\/script>')
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
<!-- Модальное окно, которое мы будем наполнять инфой через ajax -->
<div class="modal" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="mainModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="mainModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" id='closeModalButton' aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id='mainModalBody'>
       <div class="spinner-border text-success" role="status">
  <span class="sr-only">Загрузка...</span>
</div>
      </div>
      <div class="modal-footer" id="mainModalFooter">
       
      </div>
    </div>
  </div>
</div>
</body>
</html>