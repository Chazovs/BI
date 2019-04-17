@extends('layouts.mainauth')

@section('main')

<!-- вид с формой регистрации компании -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
   <img src="https://static.tildacdn.com/tild3532-6130-4437-b966-653766626265/1.jpg" class="rounded-circle" alt="" height="40" width="40">
      <h1 class="h4">Регистрация компании на BI</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Мои компании</button>
            <button type="button" class="btn btn-sm btn-outline-success" onclick="location.href = '{{ url('/home') }}'">Все компании</button>
          </div>
         
        </div>
</div>
  <div class="row">
    <div class="col-md-8 order-md-2 mb-4">
      
        <form class="needs-validation" validate action="{{ url('/registerCompany/push') }}" method="POST">
             <label for="name">Наименование компании</label>
             <input type="text" class="form-control" name="name" id="name" placeholder="" value="" required>
             {{ csrf_field() }}
              <div class="invalid-feedback">
              Valid first name is required.
        </div>
        <div class="mb-3">
        <label for="logo">Выбирите логотип Вашей компании</label>
        <input type="file" class="form-control-file" name="logo" id="logo">
        </div>
        <div class="mb-3">
          <label for="adress">Электронная почта</label>
          <input type="email" class="form-control" name="companyEmail" id="companyEmail" required placeholder="you@email.com">
          <div class="invalid-feedback">
            Введите пожалуйста корректный адрес электронной почты
          </div>
        </div>
        <div class="mb-3">
          <label for="description">Чем занимается компания? (этот текст увидят все пользователи сайта)</label>
          <textarea type="text" class="form-control" name="description" id="description" placeholder="" required></textarea> 
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
         <div class="mb-3">
            <label for="phone">Телефон компании (будет указан в карточке) </label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="" required>
            <div class="invalid-feedback">
         </div>
       </div>
        <div class="mb-3">
            <label for="adress">Адрес компании (будет указан в карточке)</label>
            <input type="text" class="form-control" id="adress" name="adress" placeholder="" value="" required>
            <div class="invalid-feedback">
         </div>
       </div>
       <div class="mb-3">
            <label for="site">Сайт (будет указан в карточке)</label>
            <input type="text" class="form-control" id="site" name="site" placeholder="" value="" required>
            <div class="invalid-feedback">
         </div>
       </div>
       <div class="mb-3">
            <label for="city">Город (будет указан в карточке)</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="" value="" required>
            <div class="invalid-feedback">
         </div>
       </div>
         <button type="submit"  class="btn btn-success mt-4">Отправить</button>
     </form>
  </div>
  <div class="col-md-4 order-md-2 mb-4">
      <div class="card">
        <img src="/img/default/donate.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Поддержите проект!</h4>
          <p class="card-text">
           Нет ничего важнее для IT-стартапов, чем поддержка пользователей. 
          </p>
          <p class="card-text">
           Вы можете перевести любую сумму в качестве пожертвования на развитие проекта.
          </p>
          <a href="#!" class="btn btn-success">Я поддерживаю!</a>
        </div>
      </div>
    </div>
</div>
</div>
</main>
@endsection