@extends('layouts.mainauth')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="jumbotron">
      <h1 class="display-3">Привет, {{ auth()->user()->real_name }}</h1>
      <p class="lead">У вас недостаточно прав для просмотра этой страницы</p>
      <hr class="my-2">
      <p>Только администраторы компании могут модерировать заявки на вступление в компанию.</p>
    </div>
    </main>
@endsection
